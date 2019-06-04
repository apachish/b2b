<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy('sort_order')->paginate(10);
        $count = Article::count();
        return view('admin.articles.index', compact('articles', 'count'));
    }

    public function dataTable(Request $request)
    {
        $search = $request->search;
        $offset = data_get($request, 'start', 0);
        $limit = data_get($request, 'length', 10);
        $search = $request->search;
        $list = Article::query();
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
        return view('admin.articles.create');
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
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'sort_order' => $request->sort_order,
            'description' => $request->description,
            'image' => $request->file('image') ? Article::upload($request->image) : '',
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
        $article = Article::findOrFail($id);
        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
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
        $article = Article::findOrFail($id);
        $request->validate([
            'title' => 'required|max:100',
            'language' => ['required', Rule::in(['fa', 'en'])],
            'short_description' => 'sometimes|max:1000',
            'description' => 'required|max:10000000',
            'sort_order' => 'required|numeric',

        ]);
        $article->update([
            'name' => $request->name,
            'body' => $request->body,
            'sort_order' => $request->sort_order,

            'description' => $request->description,
            'image' => $request->file('image') ? Article::upload($request->image) : $article->image,
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
        $article = Article::find($id);
        if ($article == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found article'),
                ],
                'data' => []
            ], 200);
        }
        \File::delete(public_path(Article::$path . $page->image));
        $page->delete();
        flash(__('messages.delete article'));

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Delete status article'),
            ],
            'data' => []
        ], 200);

    }

    public function changeStatus(Request $request, $id)
    {
        $page = Article::find($id);
        if ($page == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found article'),
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
                'message' => __('messages.change status article'),
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
            $article = Article::find($id);
            if ($article == null) {
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
                    $article->status = 1;
                    $article->update();
                    flash(__('messages.update status'));

                    break;
                case 'deactivate':
                    $article->status = 0;
                    $article->update();
                    flash(__('messages.update status'));

                    break;
                case 'delete':
                    $article->delete();
                    flash(__('messages.delete article'));

                    break;
                case 'order_submit':
                    $article->sort_order = $request->order[$id];
                    $article->update();
                    flash(__('messages.order change'));

                    break;

            }
        }

        return redirect('admin/articles');
    }
}
