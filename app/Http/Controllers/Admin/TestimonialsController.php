<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $testimonials = Testimonial::orderBy('created_at')->paginate(10);
        $count = Testimonial::count();
        return view('admin.testimonials.index', compact('testimonials', 'count'));
    }

    public function dataTable(Request $request)
    {
        $search = $request->search;
        $offset = data_get($request, 'start', 0);
        $limit = data_get($request, 'length', 10);
        $search = $request->search;
        $list = Testimonial::query();
        if (data_get($search, 'value')) {
            $list->where('title', 'like', "%" . data_get($search, 'value') . "%")
                ->orWhere('locale', 'like', "%" . data_get($search, 'value') . "%");

        }
        $count = $list->count();
        $list = $list->skip($offset)->take($limit)->get();
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
        return view('admin.testimonials.create');
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
        Testimonial::create([
            'title' => $request->title,
            'body' => $request->body,
            'sort_order' => $request->sort_order,
            'description' => $request->description,
            'image' => $request->file('image') ? Testimonial::upload($request->image) : '',
            'status' => $request->status,
            'locale' => $request->language,
            'feature' => $request->feature,
            'user_id' => auth()->id()
        ]);
        flash(__('messages.create testimonial'));

        return redirect('admin/testimonials');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return $testimonial ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
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
        $testimonial = Testimonial::findOrFail($id);
        $request->validate([
            'title' => 'required|max:100',
            'language' => ['required', Rule::in(['fa', 'en'])],
            'short_description' => 'sometimes|max:1000',
            'description' => 'required|max:10000000',
            'sort_order' => 'required|numeric',

        ]);
        $testimonial->update([
            'name' => $request->name,
            'body' => $request->body,
            'sort_order' => $request->sort_order,

            'description' => $request->description,
            'image' => $request->file('image') ? Testimonial::upload($request->image) : $testimonial->image,
            'status' => $request->status,
            'locale' => $request->language,
            'feature' => $request->feature,
            'user_id' => auth()->id()
        ]);
        flash(__('messages.edit testimonial'));

        return redirect('admin/testimonials');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found testimonial'),
                ],
                'data' => []
            ], 200);
        }
        \File::delete(public_path(Testimonial::$path . $page->image));
        $page->delete();
        flash(__('messages.delete testimonial'));

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Delete status testimonial'),
            ],
            'data' => []
        ], 200);

    }

    public function changeStatus(Request $request, $id)
    {
        $page = Testimonial::find($id);
        if ($page == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found testimonial'),
                ],
                'data' => []
            ], 200);
        }
        $page->status = $request->status;
        $page->update();
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.change status testimonial'),
            ],
            'data' => []
        ], 200);
    }

    public function actionRow(Request $request)
    {
        $ids = $request->arr_ids;
        if (!$ids) {
            flash(__('messages.no select item'));
            return redirect('admin/testimonials');

        }
        foreach ($ids as $id) {
            $testimonial = Testimonial::find($id);
            if ($testimonial == null) {
                return response()->json([
                    'status' => 'failed',
                    'meta' => [
                        'code' => 400,
                        'message' => __('messages.not found testimonial'),
                    ],
                    'data' => []
                ], 200);
            }
            switch ($request->action) {
                case 'active':
                    $testimonial->status = 1;
                    $testimonial->update();
                    flash(__('messages.update status'));

                    break;
                case 'deactivate':
                    $testimonial->status = 0;
                    $testimonial->update();
                    flash(__('messages.update status'));

                    break;
                case 'delete':
                    $testimonial->delete();
                    flash(__('messages.delete testimonial'));

                    break;
                case 'order_submit':
                    $testimonial->sort_order = $request->order[$id];
                    $testimonial->update();
                    flash(__('messages.order change'));

                    break;

            }
        }

        return redirect('admin/testimonials');
    }
}
