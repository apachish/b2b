<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = Page::select('id','name','friendly_url','image',
            'status','locale','last_modified_by','short_description')->paginate(10);
        $count = Page::count();
        return view('admin.pages.index',compact('pages','count'));
    }

    public function dataTable(Request $request)
    {
        $search = $request->search;
        $offset = data_get($request,'start',0);
        $limit = data_get($request,'length',10);
        $search = $request->search;
        $list = Page::select('id','name','friendly_url','image',
            'status','locale','last_modified_by','short_description');
        if (data_get($search, 'value')) {
            $list->where('name','like',"%".data_get($search, 'value')."%")
                ->orWhere('locale','like',"%".data_get($search, 'value')."%");

        }
        $count = $list->count();
        $list = $list->skip($offset)->take($limit)->get();
        return  $response = array(
            "draw"=> intval($request->draw),
            "recordsTotal"=> $count,
            "recordsFiltered"=> $count,
            "data"=>$list,
        );;


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'language' => ['required',Rule::in(['fa','en'])],
            'description' => 'required|max:10000',
        ]);
        Page::create([
            'name'=>$request->name,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'image'=>$request->file('image')?Page::upload($request->image):'',
            'status'=>$request->status,
            'locale'=>$request->language,
            'last_modified_by'=>auth()->id()
        ]);
        flash(__('messages.create Page'));

        return redirect('admin/pages');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return $page;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = page::findOrFail($id);
        $request->validate([
            'name' => 'required|max:100',
            'language' => ['required',Rule::in(['fa','en'])],
            'short_description' => 'sometimes|max:1000',
            'description' => 'required|max:10000000',
        ]);
        $page->update([
            'name'=>$request->name,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'image'=>$request->file('image')?Page::upload($request->image):$page->image,
            'status'=>$request->status,
            'locale'=>$request->language,
            'last_modified_by'=>auth()->id()
        ]);
        flash(__('messages.edit Page'));

        return redirect('admin/pages');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if($page == null)
        {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found page'),
                ],
                'data' => []
            ],200);
        }
        File::delete(public_path(Page::$path.$page->image));
        $page->delete();
        flash(__('messages.delete Page'));

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Delete status page'),
            ],
            'data' => []
        ],200);

    }

    public function changeStatus(Request $request,$id)
    {
        $page = Page::find($id);
        if($page == null)
        {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found page'),
                ],
                'data' => []
            ],200);
        }
        $page->status = $request->status;
        $page->update();
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.change status page'),
            ],
            'data' => []
        ],200);
    }
    public function move()
    {
        $pages =\DB::table('tbl_cms_pages')->get();
        foreach ($pages as $page){
            Page::create([
                'name'=>$page->page_name,
                'short_description'=>$page->page_short_description,
                'description'=>$page->page_description,
                'image'=>$page->image,
                'status'=>1,
                'locale'=>$page->language,
                'last_modified_by'=>1
            ]);
        }
    }
}
