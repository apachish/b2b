<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\City;
use App\Lead;
use App\Order;
use App\Seller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-location')->only('postRequest');

    }
    public function index(Request $request)
    {
        $limit = $request->get('limit', 15);
        $city_filter = $request->get('city', '');
        $term = $request->get('search', '');
        $seller_type = Seller::all();
        $seller = $request->get('seller', []);
        $title_page = __("messages.Search");
        $ip_info = \Cache::get($request->ip());

        $cities = City::where('state_id',data_get($ip_info,'state_id'))->get();
        switch ($request->type) {
            case 'companies':
                $search = User::query();
                if ($city_filter) {
                    $search->where('city_id', $city_filter);
                }
                if ($seller_type) {
                    $search->whereHas('sellers', function ($query) use ($seller) {
                        $query->whereIn('id', $seller);
                    });
                }
                $search->where('status', 1);
                $search->where(function ($query) use ($term) {
                    $query->where('first_name', 'like', "%" . $term . "%");
                    $query->orWhere('last_name', 'like', "%" . $term . "%");
                    $query->orWhere('username', 'like', "%" . $term . "%");
                    $query->orWhere('company_name', 'like', "%" . $term . "%");
                    $query->orWhereHas('category', function ($query_category) use ($term) {
                        $query_category->where(function ($q) use ($term) {
                            $q->where('name', 'like', "%" . $term . "%");
                            $q->orWhere('name_fa', 'like', "%" . $term . "%");
                        });
                    });
                    $query->orWhereHas('categories', function ($query_category) use ($term) {
                        $query_category->where(function ($q) use ($term) {
                            $q->where('name', $term);
                            $q->orWhere('name_fa', 'like', "%" . $term . "%");
                        });
                    });
                    $query->orWhereHas('leads', function ($query_lead) use ($term) {
                        $query_lead->where(function ($q) use ($term) {
                            $q->where('name', 'like', "%" . $term . "%");
                            $q->where('meta_keywords', 'like', "%" . $term . "%");
                        });
                    });
                });
                $view = 'companies.index';
                break;
            case 'buyselllead':
                $search = Lead::query();
                $search->where('status', 1);
                $search->where('approval_status', 2);
                $search->where('locale', app()->getLocale());
                $search->where(function ($query) use ($term) {
                    $query->where('name', 'like', "%" . $term . "%");
                    $query->orWhere('meta_keywords', 'like', "%" . $term . "%");
                    $query->orWhereHas('categories', function ($query_category) use ($term) {
                        $query_category->where(function ($q) use ($term) {
                            $q->where('name', $term);
                            $q->orWhere('name_fa', 'like', "%" . $term . "%");
                        });
                    });
                });
                $view = 'leads.list';
                $title_page = __("messages.Leads");

                break;
            case 'buylead':
                $search = Lead::query();
                $search->where('ad_type', 'buy');
                $search->where('status', 1);
                $search->where('approval_status', 2);
                $search->where('locale', app()->getLocale());
                $search->where(function ($query) use ($term) {
                    $query->where('name', 'like', "%" . $term . "%");
                    $query->orWhere('meta_keywords', 'like', "%" . $term . "%");
                    $query->orWhereHas('categories', function ($query_category) use ($term) {
                        $query_category->where(function ($q) use ($term) {
                            $q->where('name', $term);
                            $q->orWhere('name_fa', 'like', "%" . $term . "%");
                        });
                    });
                });
                $view = 'leads.list';

                $title_page = __("messages.Buying Leads");

                break;
            case 'selllead':
                $search = Lead::query();
                $search->where('ad_type', 'sell');
                $search->where('status', 1);
                $search->where('approval_status', 2);
                $search->where('locale', app()->getLocale());
                $search->where(function ($query) use ($term) {
                    $query->where('name', 'like', "%" . $term . "%");
                    $query->orWhere('meta_keywords', 'like', "%" . $term . "%");
                    $query->orWhereHas('categories', function ($query_category) use ($term) {
                        $query_category->where(function ($q) use ($term) {
                            $q->where('name', $term);
                            $q->orWhere('name_fa', 'like', "%" . $term . "%");
                        });
                    });
                });
                $view = 'leads.list';

                $title_page = __("messages.Selling Leads");

                break;
        }
        $membership = Order::where('member_id', auth()->id())->where('price', '!=', 0)->where('upgrade_status', 'New')->where('exp_date', '>', Carbon::now())->first();
        $categories = Category::orderByRaw('RAND()')->take(10)->get();
        $countItem = $search->count();
        $result = $search->paginate($limit);
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('image', '!=', 0)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('image', '!=', 0)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();
        $banner_middle = Banner::where('banner_position', Banner::BANNER_POSITION_MIDDLE)->where('image', '!=', 0)->where('status', 1)->orderByRaw('RAND()')->take(1)->get();
        $company_featured = [];
        $products_featured = [];
        if ($request->type == 'companies')
            $company_featured = User::with('category')->where('featured_company', 1)->whereStatus(1)->orderByRaw('RAND()')->take(6)->get();
        else
            $products_featured = Lead::whereStatus(1)->with(['user', 'medias' => function ($q) {
                $q->where('is_default', true);
            }, 'categories'])->where('approval_status', 2)->orderByRaw('RAND()')->take(30)->get();
        return view($view, compact('countItem', 'result', 'city_filter', 'seller_type','seller', 'banner_button',
            'banner_left', 'company_featured', 'products_featured','title_page','cities','banner_middle','categories','membership'));
    }
}
