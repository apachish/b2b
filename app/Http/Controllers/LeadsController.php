<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EditLead;
use App\Http\Requests\StoreLead;
use App\Lead;
use App\Media;
use App\Membership;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-location');

    }

    public function index(Request $request)
    {
        $leads = auth()->user()->leads()->with(['medias' => function ($q) {
            $q->where('is_default', true);
        }, 'categories' => function ($q) {
            $q->with('ancestors');
        }]);
        if ($request->ad_type) {
            $leads->where('ad_type', $request->ad_type);
        }
        if ($request->search) {
            $search = $request->search;
            $leads->where(function ($q) use ($search) {
                $q->where('name', 'like', "%" . $search . "%");
                });
        }
        $leads = $leads->orderBy('updated_at', 'DESC')->paginate(10);
        $filter = $request->ad_type;
        return view('leads.index', compact('leads', 'filter'));
    }

    public function create(Request $request, $type_ad = 'buy')
    {
        $selectItem = 0;
        $AllowedUploadProduct = 0;
        $membership = Order::where('member_id', auth()->id())->where('upgrade_status', 'New')->where('exp_date', '>', Carbon::now())->first();
        if ($membership == null) {
            do {
                $uniq_code = "INVOICE-" . Str::random(6);
            } while (Order::whereOrderNo($uniq_code)->count() > 0);
            $plan = Membership::where('price', 0)->where('status', 1)->where('locale', app()->getLocale())->first();
            if ($plan) {
                $membership = Order::create([
                    'order_no' => $uniq_code,
                    'member_id' => auth()->id(),
                    'plan_id' => $plan->id,
                    'plan_name' => $plan->plan_name,
                    'price' => $plan->price,
                    'duration' => $plan->duration,
                    'allowed_products' => $plan->product_upload,
                    'category_allowed' => $plan->no_of_category,
                    'allowed_request' => $plan->no_of_enquiry,
                    'activation_date' => Carbon::now(),
                    'exp_date' => Carbon::now()->addMonth($plan->duration),
                    'payment_status' => '0',
                    'payment_mode' => 'Paypal',
                    'upgrade_status' => 'New'
                ]);
            }

        }
        if ($membership != null && $membership->price && $membership->payment_status != 1) {
            $membership = [];
        }

        if ($membership) {
            $selectItem = $membership->no_of_category;
            $AllowedUploadProduct = $membership->allowed_products;
        }
        $id_category_user = auth()->user()->category->id;
        if ($type_ad == 'sell') {
            $categories = Category::whereIn('id', [$id_category_user])->where('status', 1)->get();
            $subcategories = Category::where('parent_id', $id_category_user)->where('status', 1)->get();
        } else {
            $categories = Category::where('parent_id', Null)->where('status', 1)->get();
            $subcategories = [];
        }
        $sort_order = auth()->user()->leads()->count() + 1;
        return view('leads.create', compact('membership', 'selectItem', 'type_ad', 'categories', 'subcategories', 'sort_order', 'AllowedUploadProduct', 'id_category_user'));
    }

    public function edit(Request $request, $slug_lead)
    {
        $lead = Lead::whereSlug($slug_lead)->with(['medias' => function ($q) {
            $q->orderBy('sort_order', 'asc');
        }])->firstOrFail();

        $type_ad = $lead->ad_type;
        $selectItem = 0;
        $AllowedUploadProduct = 0;
        $membership = Order::where('member_id', auth()->id())->where('upgrade_status', 'New')->where('exp_date', '>', Carbon::now())->first();
        if ($membership != null && $membership->price && $membership->payment_status != 1) {
            $membership = [];
        } else {
            $selectItem = $membership->no_of_category;
            $AllowedUploadProduct = $membership->allowed_products;
        }
        $id_category_user = auth()->user()->category->id;
        $category_lead = $lead->categories()->with('ancestors')->get();
        $category = $category_lead->first();
        if ($type_ad == 'sell') {
            $parent_parent__id = $id_category_user;
            $categories = Category::whereIn('id', [$id_category_user])->where('status', 1)->get();
            $subcategories = Category::where('parent_id', $id_category_user)->where('status', 1)->get();
        } else {
            $categories = Category::where('parent_id', Null)->where('status', 1)->get();
            $subcategories = [];
            if (data_get($category, 'ancestors.0.id')) {
                $subcategories = Category::where('status', 1)->where('parent_id', $category->ancestors[0]->id)->get();
                $parent_parent__id = $category->ancestors[0]->id;
            }
        }
        if (data_get($category, 'ancestors.1.id')) {
            $parent_id = $category->ancestors[1]->id;

            $sub_sub_categories = Category::where('status', 1)->where('parent_id', $category->ancestors[1]->id)->get();
        }

        $sort_order = auth()->user()->leads()->count() + 1;
        return view('leads.edit', compact('membership', 'selectItem',
            'type_ad', 'categories', 'subcategories', 'sort_order', 'sub_sub_categories', 'category_lead',
            'parent_parent__id', 'parent_id',
            'AllowedUploadProduct', 'id_category_user', 'lead'));
    }

    public function store(StoreLead $request)
    {
        $ip_info = \Cache::get($request->ip());

        $lead = auth()->user()->leads()->create([
            'name' => $request->name,
            'ad_type' => $request->ad_type,
            'description' => $request->description,
            'detail_description' => $request->detail_description,
            'meta_data' => json_encode($ip_info),
            'meta_keywords' => $request->meta_keywords,
            'sort_order' => $request->sort_order,
            'city_id' => data_get($ip_info, 'city_id'),
            'locale' => app()->getLocale()
        ]);
        if ($request->category3) {
            $lead->categories()->syncWithoutDetaching($request->category3);
        } elseif ($request->category2) {
            $lead->categories()->syncWithoutDetaching($request->category2);
        } elseif ($request->category) {
            $lead->categories()->syncWithoutDetaching($request->category);
        }
        if ($lead->ad_type == 'sell' && $request->file('image')) {
            foreach ($request->file('image') as $i => $image) {
                Media::$section = 'medias';
                Media::$path = public_path() . '/images/' . Media::$section . '/' . Media::$type_file . '/';
                Media::$id = $lead->id;
                $media_file = Media::upload($image);
                $media = Media::create(['type' => 'photo', 'media' => $media_file]);
                $lead->medias()->where('sort_order', $i)->delete();
                $lead->medias()->syncWithoutDetaching([$media->id => ['is_default' => $i == 0 ? true : false, 'sort_order' => $i]]);
            }
        }
        return redirect('/member/manage-leads');
    }

    public function update(EditLead $request, $slug_lead)
    {
        $lead = Lead::whereSlug($slug_lead)->firstOrFail();

        $lead->update([
            'name' => $request->name,
            'ad_type' => $request->ad_type,
            'description' => $request->description,
            'detail_description' => $request->detail_description,
            'meta_data' => $request->meta_data,
            'meta_keywords' => $request->meta_keywords,
        ]);
        $categories = $lead->categories()->get()->pluck('id')->toArray();

        if ($request->category3) {
            $remove = array_diff($categories, $request->category3);
            $lead->categories()->detach($remove);
            $lead->categories()->syncWithoutDetaching($request->category3);
        } elseif ($request->category2) {
            $remove = array_diff([$request->category2], $categories);
            $lead->categories()->detach($remove);
            $lead->categories()->syncWithoutDetaching($request->category2);

        } elseif ($request->category) {
            $remove = array_diff([$request->category], $categories);
            $lead->categories()->detach($remove);
            $lead->categories()->syncWithoutDetaching($request->category);

        }

        if ($request->file('image')) {
            foreach ($request->file('image') as $i => $image) {
                Media::$section = 'medias';
                Media::$path = public_path() . '/images/' . Media::$section . '/' . Media::$type_file . '/';
                Media::$id = $lead->id;
                $media_file = Media::upload($image);
                $media = Media::create(['type' => 'photo', 'media' => $media_file]);
                $lead->medias()->where('sort_order', $i)->delete();
                $lead->medias()->syncWithoutDetaching([$media->id => ['is_default' => $i == 0 ? true : false, 'sort_order' => $i]]);
            }
        }
        return redirect('/member/manage-leads');

    }
}
