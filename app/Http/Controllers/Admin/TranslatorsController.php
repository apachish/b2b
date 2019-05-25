<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\TranslationLoader\LanguageLine;

class TranslatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translates = LanguageLine::paginate(10);
        $count = LanguageLine::count();
        return view('admin.translates.index',compact('translates','count'));

    }
    public function dataTable(Request $request)
    {
//        $list = auth()->user()->notifications()->with(['user', 'group'])->paginate(10);
//        return $notifications = new NotificationCollection($list);

        $search = $request->search;
        $list = LanguageLine::query();
        if (data_get($search, 'value')) {
           $list->where('key','like',"%".data_get($search, 'value')."%")
               ->orWhere('text','like',"%".data_get($search, 'value')."%");

        }
        $count = $list->count();
        $list = $list->skip($request->start)->take($request->length)->get();
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
        return view('admin.translates.create');
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
            'key' => 'required',
            'name_fa' => 'required',
            'name_en' => 'required',
        ]);

        LanguageLine::create([
            'group' => 'messages',
            'key' => $request->key,
            'text' => ['en' => $request->name_en, 'fa' => $request->name_fa],
        ]);
        return redirect('admin/translators');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $translate = LanguageLine::find($id);
        if($translate == null) return abort(404);
        $translate->update($request->only('text'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change(Request $request)
    {
        foreach ($request->translator as $key=>$translator){
            $language = LanguageLine::find($key);
            $language->update(['text'=>$translator]);
        }
        return response()->json(['status'=>200,'message'=>__('messages.successfully to update translator!')]);
    }
    public function move(){
        $translates = \DB::connection('mongodb')->collection('Translate')->get();
        foreach ($translates as $translate){
            $title = data_get($translate,'title');
            if($title){
                LanguageLine::create([
                    'group' => 'messages',
                    'key' => $title,
                    'text' => ['en' => $title, 'fa' => data_get($translate,'translate')],
                ]);
            }

        }


    }
}
