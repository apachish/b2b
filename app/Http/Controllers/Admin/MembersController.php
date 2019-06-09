<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $members = User::orderBy('updated_at','DESC')->paginate(10);
        $count = User::count();
        return view('admin.members.index', compact('members', 'count'));
    }

    public function dataTable(Request $request)
    {
        $search = $request->search;
        $offset = data_get($request, 'start', 0);
        $limit = data_get($request, 'length', 10);
        $search = $request->search;
        $list = User::query();
        if (data_get($search, 'value')) {
            $list->where('title', 'like', "%" . data_get($search, 'value') . "%")
                ->orWhere('locale', 'like', "%" . data_get($search, 'value') . "%");

        }
        $count = $list->count();
        $list = $list->skip($offset)->take($limit)->orderBy('updated_at','DESC')->get();
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
        return view('admin.members.create');
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
            'title' => 'required|max:100',
            'language' => ['required', Rule::in(['fa', 'en'])],
            'description' => 'required|max:10000',
            'body' => 'required|max:1000000',
            'sort_order' => 'required|numeric',
        ]);
        User::create([
            'title' => $request->title,
            'body' => $request->body,
            'sort_order' => $request->sort_order,
            'description' => $request->description,
            'image' => $request->file('image') ? User::upload($request->image) : '',
            'status' => $request->status,
            'locale' => $request->language,
            'feature' => $request->feature,
            'user_id' => auth()->id()
        ]);
        flash(__('messages.create Article'));

        return redirect('admin/articles');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::findOrFail($id);
        return view('admin.members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('admin.members.edit', compact('article'));
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
        $member = User::findOrFail($id);
        $request->validate([
            'title' => 'required|max:100',
            'language' => ['required', Rule::in(['fa', 'en'])],
            'short_description' => 'sometimes|max:1000',
            'description' => 'required|max:10000000',
            'sort_order' => 'required|numeric',

        ]);
        $member->update([
            'name' => $request->name,
            'body' => $request->body,
            'sort_order' => $request->sort_order,

            'description' => $request->description,
            'image' => $request->file('image') ? User::upload($request->image) : $member->image,
            'status' => $request->status,
            'locale' => $request->language,
            'feature' => $request->feature,
            'user_id' => auth()->id()
        ]);
        flash(__('messages.edit Page'));

        return redirect('admin/articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = User::find($id);
        if ($member == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found article'),
                ],
                'data' => []
            ], 200);
        }
        \File::delete(public_path( public_path() . '/images/logo/'. $member->company_logo));
        \File::delete(public_path(public_path() . '/images/avatar/' . $member->image_path));
        $member->delete();
        flash(__('messages.delete members'));

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Delete status members'),
            ],
            'data' => []
        ], 200);

    }

    public function changeStatus(Request $request, $id)
    {
        $member = User::find($id);
        if ($member == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found Member'),
                ],
                'data' => []
            ], 200);
        }
        $member->status = $request->status;
        $member->update();
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.change status Member'),
            ],
            'data' => []
        ], 200);
    }

    public function actionRow(Request $request)
    {
        $ids = $request->arr_ids;
        if (!$ids) {
            flash(__('messages.no select item'));
            return redirect('admin/articles');

        }
        foreach ($ids as $id) {
            $member = User::find($id);
            if ($member == null) {
                return response()->json([
                    'status' => 'failed',
                    'meta' => [
                        'code' => 400,
                        'message' => __('messages.not found article'),
                    ],
                    'data' => []
                ], 200);
            }
            switch ($request->action) {
                case 'active':
                    $member->status = 1;
                    $member->update();
                    flash(__('messages.update status'));

                    break;
                case 'deactivate':
                    $member->status = 0;
                    $member->update();
                    flash(__('messages.update status'));

                    break;
                case 'delete':
                    $member->delete();
                    flash(__('messages.delete article'));

                    break;
                case 'order_submit':
                    $member->sort_order = $request->order[$id];
                    $member->update();
                    flash(__('messages.order change'));

                    break;

            }
        }

        return redirect('admin/articles');
    }
}
