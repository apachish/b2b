<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\EditLead;
use App\Http\Requests\StoreLead;
use App\Lead;
use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::with(['medias' => function ($q) {
            $q->where('is_default', true);
        }, 'categories' => function ($q) {
            $q->with('ancestors');
        }])->orderBy('updated_at','DESC')->paginate(10);
        $count = Lead::count();
        $data = [
            "startDate" => "",
            "endDate" => "",

        ];
        $cities = [];
        $members = [];
        $categories = [];
        $subcategories = [];
        $subsubcategories = [];
        return view('admin.leads.index', compact('leads', 'count', 'data', 'cities', 'members', 'categories', 'subcategories', 'subsubcategories'));
    }

    public function dataTable(Request $request)
    {
        $search = $request->search;
        $offset = data_get($request, 'start', 0);
        $limit = data_get($request, 'length', 10);
        $search = $request->search;
        $list = Lead::query();
        if (data_get($search, 'value')) {
            $list->where('name', 'like', "%" . data_get($search, 'value') . "%")
                ->orWhere('locale', 'like', "%" . data_get($search, 'value') . "%");

        }
        $count = $list->count();
        $list = $list->orderBy('updated_at','DESC')->skip($offset)->take($limit)->get();
        $leads = $list->map(function ($lead) {
            $info_lead = '<p>' . $lead->name . '</p>';
            $info_lead .= '<p>' . __("messages.Ad Type") . ':' . $type = $lead->ad_type == '1' ? __("messages.Sell") : __("messages.Buy") . '</p>';
            $info_lead .= '<p><a href="' . route('home.companies.info', ['slug_companies' => $lead->user->slug]) . '" class="btn btn-dark" target="_blank">';
            $info_lead .= $lead->user->getCompanyName() . '</a>:' . __("messages.Sender Name");
            $info_lead .= '</p><p>';
            if ($lead->user->featured_company)
                $info_lead .= '<span class="label label-default label-form" >' . __("messages.Featured") . '</span >';
            $info_lead .= '</p ><div style = "margin-top:3px; color:#F00" ><strong >' . __("messages.No of visits") . ' : ' . $lead->no_of_visits . '</strong ></div >';
            $info_lead .= '</p ><div style = "margin-top:3px; color:#F00" ><strong >' . __("messages.No of visits") . ' : ' . $lead->push_request == '1' ? "Push Request" : "" . '</strong ></div >';
            $lead->info_lead = $info_lead;
            $lead->image = '<a data-toggle="modal" onclick="imagePreview(this)" data-target="#modal_image" class=" image-preview" data-icon="' . url('images/medias/photos/' . $lead->medias->first()->media) . '"
                              data-text="' . $lead->name . '"><img src="' . url('images/medias/photos/' . $lead->medias->first()->media) . '" width="100px" height="100px"></a>';
            $lead->details = '<a type="button" class=" mb-control details"
                                                   data-details="message-box-info-details"
                                                   onclick="myDetails('.$lead->id.')"
                                                   data-box="#message-box-info-details">' . __("messages.View Details") . '</a>';
            $other = __("messages.Featured") . ':';
            if ($lead->featured) {
                $other .= __("Yes");
                $other .= '<p>:' . __("messages.featured in page") . '</p>';
                $other .= '<ul dir="rtl">';
                foreach ($lead->featured as $featured) {
                    $other .= ' <li>' . __('messages.' . $featured->name) . '</li>';
                }
                $other .= '</ul>';
            } else
                $other .= __(("No"));
            $other .= '<br/>';
            if ($lead->categories) {
                $other .= __("messages.Category") . ':';
                foreach ($lead->categories->first()->ancestors as $i => $parent_cat) {
                    $other .= "<p >";

                    $other .= "<div style = 'margin-right: " . ($i * 20) . "px' ><a target = '_blank' href = '" . route('admin.categories.show', ['id' => $parent_cat->id]) . "' >";
                    $other .= $parent_cat->getCategoryTitle();
                    $other .= "</a ></div >";
                    $other .= "<div style = 'margin-right: " . ($i * 20) . "px' > _ |</div >";
                    $other .= "</p >";
                }

                $other .= "<p><div style='margin-right: 60px'><a target='_blank' href='" . route('admin.categories.show', ['id' => $lead->categories->first()->id]) . "'>" . $lead->categories->first()->getCategoryTitle() . "</a></div></p>";
                if (sizeof($lead->categories) > 1) {
                    $other .= '<a data-toggle="modal" data-target="#model_Category" class="ContinuationCategory" title="' . __('messages.continues category') . " " . $lead->name . '" onclick="ContinuationCategory(this)" data-id = "Category_' . $lead->id . '" >';
                    $other .= __("messages.Continuation Category") . '</a >';
                    $other .= '<div id = "Category_' . $lead->id . '" style = "display: none" >';
                    foreach ($lead->categories as $category) {

                        foreach ($category->ancestors as $i => $parent_cat) {
                            $other .= "<p >";

                            $other .= "<div style = 'margin-right: " . ($i * 20) . "px' ><a target = '_blank' href = '" . route('admin.categories.show', ['id' => $parent_cat->id]) . "' >";
                            $other .= $parent_cat->getCategoryTitle();
                            $other .= "</a ></div >";
                            $other .= "<div style = 'margin-right: " . ($i * 20) . "px' > _ |</div >";
                            $other .= "</p >";
                        }

                        $other .= "<p><div style='margin-right: 60px'><a target='_blank' href='" . route('admin.categories.show', ['id' => $category->id]) . "'>" . $category->getCategoryTitle() . "</a></div></p>";
                    }
                    $other .= '</div >';
                }
            }
            $other .= '<br/>';
            $lead->other = $other;

            $approval_status = '<select class="form-control approvalStatus" onchange="changeStatus(this,' . $lead->id . ',\'approval_status\')" name="approvalStatus" data-id="' . $lead->id . '" id="approvalStatus_' . $lead->id . '">';
            $approval_status .= '<option value="1"';
            if ($lead->approval_status == 1)
                $approval_status .= 'selected';
            $approval_status .= '>' . __("messages.Pending") . '</option>';
            $approval_status .= '<option value="2"';
            if ($lead->approval_status == 2)
                $approval_status .= 'selected';
            $approval_status .= '>' . __("messages.Approved") . '</option>';
            $approval_status .= '<option value="3"';
            if ($lead->approval_status == 3)
                $approval_status .= 'selected';
            $approval_status .= '>' . __("messages.Rejected") . '</option>';
            $approval_status .= '</select>';
            $lead->select_approval_status = $approval_status;
            $lead->col_id = '<input type="checkbox" name="arr_ids[]" value="'.$lead->id.'" />';

            $status = '<select class="form-control status" onchange="changeStatus(this,' . $lead->id . ',\'status\')" name="change_status" data-id="' . $lead->id . '" id="Status_' . $lead->id . '">';
            $status .= '<option value="0"';
            if ($lead->status == 0)
                $status .= 'selected';
            $status .= '>' . __("messages.New Laed") . '</option>';
            $status .= '<option value="-1"';
            if ($lead->status == -1)
                $status .= 'selected';
            $status .= '>' . __("messages.Inactive") . '</option>';
            $status .= '<option value="1"';
            if ($lead->status == 1)
                $status .= 'selected';
            $status .= '>' . __("messages.Active") . '</option>';
            $status .= '</select>';
            $lead->select_status = $status;

            $action = '<a href="' . route('admin.leads.edit', ['id' => $lead->id]) . '"><i  class="fa fa-pencil"></i></a>';
            $action .= '<a class="delete" data-id="' . $lead->id . '" href="#" onclick="myDelete(' . $lead->id . ')"><i class="glyphicon glyphicon-remove-circle"></i></a>';
            $lead->action = $action;
            $lead->created_at_col = app()->getLocale() == 'fa' ? toJalali($lead->created_at) : $lead->created_at;
            return $lead;
        });
        return $response = array(
            "draw" => intval($request->draw),
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $list,
        );;


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug_categories,$slug_leads)
    {
        Lead::where('product_friendly_url',$slug_leads)->whereHas('categories',function ($query) use($slug_categories){
            if(app()->getLocale()=='fa')
            $query->where('slug_fa',$slug_categories);
            else
                $query->where('slug',$slug_categories);

        })->first();
        return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::with(['medias' => function ($q) {
            $q->orderBy('sort_order', 'asc');
        }])->findOrFail($id);
        $category_lead = $lead->categories()->with('ancestors')->get();
        $categories = Category::where('status', 1)->where('parent_id', Null)->get();
        $subcategories = [];
        $sub_sub_categories = [];
        $parent_parent__id = 0;
        $parent_id = 0;
        $category = $category_lead->first();
        if (data_get($category, 'ancestors.0.id')) {
            $subcategories = Category::where('status', 1)->where('parent_id', $category->ancestors[0]->id)->get();
            $parent_parent__id = $category->ancestors[0]->id;
        }
        if (data_get($category, 'ancestors.1.id')) {
            $parent_id = $category->ancestors[1]->id;

            $sub_sub_categories = Category::where('status', 1)->where('parent_id', $category->ancestors[1]->id)->get();
        }
        return view('admin.leads.edit', compact('lead', 'categories', 'subcategories', 'sub_sub_categories', 'category_lead'
            , 'parent_id', 'parent_parent__id'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditLead $request, $id)
    {
        $lead = Lead::findOrFail($id);
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
        return redirect('admin/leads');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::find($id);
        if ($lead == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found lead'),
                ],
                'data' => []
            ], 200);
        }
        $lead->delete();
        flash(__('messages.delete lead'));

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Delete lead'),
            ],
            'data' => []
        ], 200);
    }

    public function changeStatus(Request $request, $id)
    {
        $lead = Lead::find($id);
        if ($lead == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found lead'),
                ],
                'data' => []
            ], 200);
        }
        $status = $request->filed;
        $lead->$status = $request->status;
        $lead->update();
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.change status lead'),
            ],
            'data' => []
        ], 200);
    }
    function formDetails(Request $request,$id){
        $lead = Lead::findOrFail($id);
        return view('admin.leads.details',compact('lead'));
    }
    function details(Request $request,$id){
        $lead = Lead::find($id);
        if ($lead == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found lead'),
                ],
                'data' => []
            ], 200);
        }

        $lead->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'detail_description'=>$request->detail_description,
        ]);
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.change info lead'),
            ],
            'data' => []
        ], 200);
    }
}
