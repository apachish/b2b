<?php

namespace App\Http\Controllers\Admin;

use App\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $memberships = Membership::orderBy('updated_at','DESC')->paginate(10);
        $count = Membership::count();
        return view('admin.memberships.index', compact('memberships', 'count'));
    }

    public function dataTable(Request $request)
    {
        $search = $request->search;
        $offset = data_get($request, 'start', 0);
        $limit = data_get($request, 'length', 10);
        $search = $request->search;
        $list = Membership::query();
        if (data_get($search, 'value')) {
            $list->where('plan_name', 'like', "%" . data_get($search, 'value') . "%")
                ->orWhere('locale', 'like', "%" . data_get($search, 'value') . "%");

        }
        $count = $list->count();
        $list = $list->orderBy('updated_at','DESC')->skip($offset)->take($limit)->get();
        $memberships = $list->map(function ($membership) {
            $status = '<select class="form-control status" onchange="changeStatus(this,' . $membership->id . ',\'status\')" name="change_status" data-id="' . $membership->id . '" id="Status_' . $membership->id . '">';
            $status .= '<option value=0';
            if ($membership->status == 0)
                $status .= 'selected';

            $status .= '>' . __("messages.Inactive") . '</option>';
            $status .= '<option value=1';
            if ($membership->status == 1)
                $status .= 'selected';
            $status .= '>' . __("messages.Active") . '</option>';
            $status .= '</select>';
            $membership->select_status = $status;
            $membership->col_id = '<input type="checkbox" name="arr_ids[]" value="' . $membership->id . '" />';

            $action = '<a href="' . route('admin.members.memberships.edit', ['id' => $membership->id]) . '"><i  class="fa fa-pencil"></i></a>';
            $action .= '<a class="delete" data-id="' . $membership->id . '" href="#" onclick="myDelete(' . $membership->id . ')"><i class="glyphicon glyphicon-remove-circle"></i></a>';
            $membership->action = $action;
            $membership->created_at_col = app()->getLocale() == 'fa' ? toJalali($membership->created_at) : $membership->created_at;
            $membership->updated_at_col = app()->getLocale() == 'fa' ? toJalali($membership->updated_at) : $membership->updated_at;
            return $membership;
        });
        return $response = array(
            "draw" => intval($request->draw),
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $list,
        );;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memberships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|max:100',
            'price' => 'required',
            'duration' => 'required|numeric',
            'product_upload' => 'required|numeric',
            'no_of_category' => 'required|numeric',
            'no_of_enquiry' => 'required|numeric',
        ]);
        Membership::create([
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'duration' => $request->duration,
            'product_upload' => $request->product_upload,
            'status' => $request->status,
            'locale' => $request->language,
            'no_of_category' => $request->no_of_category,
            'no_of_enquiry' => $request->no_of_enquiry
        ]);
        flash(__('messages.create membership'));

        return redirect('admin/memberships');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membership = Membership::findOrFail($id);
        return $membership;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        return view('admin.memberships.edit', compact('membership'));
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
        $membership = Membership::findOrFail($id);
        $request->validate([
            'plan_name' => 'required|max:100',
            'price' => 'required',
            'duration' => 'required|numeric',
            'product_upload' => 'required|numeric',
            'no_of_category' => 'required|numeric',
            'no_of_enquiry' => 'required|numeric',

        ]);
        $membership->update([
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'duration' => $request->duration,
            'product_upload' => $request->product_upload,
            'status' => $request->status,
            'locale' => $request->language,
            'no_of_category' => $request->no_of_category,
            'no_of_enquiry' => $request->no_of_enquiry
        ]);
        flash(__('messages.edit membership'));

        return redirect('admin/memberships');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);
        if ($membership == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found memberships'),
                ],
                'data' => []
            ], 200);
        }
        $membership->delete();
        flash(__('messages.delete article'));

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Delete status memberships'),
            ],
            'data' => []
        ], 200);

    }

    public function changeStatus(Request $request, $id)
    {
        $membership = Membership::find($id);
        if ($membership == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found memberships'),
                ],
                'data' => []
            ], 200);
        }
        $membership->status = $request->status;
        $membership->update();
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.change status memberships'),
            ],
            'data' => []
        ], 200);
    }

}
