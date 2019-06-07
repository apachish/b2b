<?php

namespace App\Http\Controllers\Admin;

use App\Lead;
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
        }])->paginate(10);
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
        $list = $list->skip($offset)->take($limit)->get();
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
            $lead->image = '<a data-toggle="modal" data-target="#modal_image" class=" image-preview" data-icon="' . url('images/medias/photos/' . $lead->medias->first()->media) . '"
                              data-text="{{ $lead->name }}"><img src="' . url('images/medias/photos/' . $lead->medias->first()->media) . '" width="100px" height="100px"></a>';
            $lead->details = '<a type="button" class=" mb-control details"
                                                   data-details="message-box-info-details"
                                                   data-url="' . url('management_empty/products_detail', ['id' => $lead['id']]) . '"
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
                $other .= __("messages.Category") . ':' . $lead->categories->first()->getCategoryTitle();
                if (sizeof($lead->categories) > 1) {
                    $other .= '<a data - toggle = "modal" data-target = "#message-box-info-Category" class="ContinuationCategory" data-id = "Category_' . $lead->id . '" >';
                    $other .= __("messages.Continuation Category") . '</a >';
                    $other .= '<div id = "Category_' . $lead->id . '" style = "display: none" >';
                    foreach ($lead->categories as $category) {
                        $other .= $category->getCategoryTitle();
                    }
                    $other .= '</div >';
                }
            }
            $other .= '<br/>';
            $lead->other = $other;

            $approval_status = '<select class="form-control approvalStatus" name="approvalStatus" data-id="' . $lead->id . '" id="approvalStatus_' . $lead->id . '">';
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

            $status = '<select class="form-control status" name="change_status" data-id="' . $lead->id . '" id="Status_' . $lead->id . '">';
            $status .= '<option value="0"';
            if ($lead->approval_status == 0)
                $status .= 'selected';
            $status .= '>' . __("messages.New Laed") . '</option>';
            $status .= '<option value="-1"';
            if ($lead->approval_status == -1)
                $status .= 'selected';
            $status .= '>' . __("messages.Inactive") . '</option>';
            $status .= '<option value="1"';
            if ($lead->approval_status == 1)
                $status .= 'selected';
            $status .= '>' . __("messages.Active") . '</option>';
            $status .= '</select>';
            $lead->select_status = $status;

            $action = '<a href="' . route('leads.edit', ['id' => $lead->id]) . '"><i  class="fa fa-pencil"></i></a>';
            $action .= '<a class="delete" data-id="' . $lead->id . '" href="#"><i class="glyphicon glyphicon-remove-circle"></i></a>';
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.leads.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
