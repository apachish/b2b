<?php

namespace App\Http\Controllers\Admin;

use App\CategoryMenu;
use App\Portal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = "";
        $categories = CategoryMenu::all();
        return view('admin.categories-menu.index',compact('language','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portals = Portal::where('status',1)->get();
        return view('admin.categories-menu.create',compact('portals'));

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
            'title' => 'required|max:100',
            'status' => 'required|boolean',
            'locale'=>'required',
            'position'=>'required'
        ]);
        $category_menu = CategoryMenu::create($request->only(['title','url','meta_description'
            ,'meta_keyword','meta_data','status','locale','type_menu','position']));
        $category_menu->portals()->attach($request->get('portal_id'));
        return redirect('/admin/menus/categories');


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
        $category_menu = CategoryMenu::with('portals')->find($id);
        if($category_menu== null) abort(404);
        $portals = Portal::where('status',1)->get();

        return view('admin.categories-menu.edit',compact('category_menu','portals'));

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
        $request->validate([
            'title' => 'required|max:100',
            'status' => 'required|boolean',
            'locale'=>'required',
            'position'=>'required'
        ]);
        $category_menu = CategoryMenu::find($id);
        if($category_menu== null) abort(404);
        $category_menu->update($request->only(['title','url','meta_description'
            ,'meta_keyword','meta_data','status','locale','type_menu','position']));
        $category_menu->portals()->sync($request->get('portal_id'));
        return redirect('/admin/menus/categories');
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
}
