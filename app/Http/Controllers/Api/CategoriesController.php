<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $id = null, $status = 'active', $language = false)
    {
        $category = Category::query();
        if ($status) {
            $status = $status == 'active' ? 1 : 0;
            $category->where('status', $status);
        }
        $search = data_get($request, 'term.term');
        if ($search) {
            $category->where('name', 'like', '%' . $search . '%');
            $category->Orwhere('name_fa', 'like', '%' . $search . '%');

        }
        $category->where('parent_id', $id);
        $categories = $category->get();
        $categories = new CategoryCollection($categories, $language ?: app()->getLocale());
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::query();
        $category->where('status', 1);
        $category->where('id', $id);
        $categories = $category->get();
        $categories = new CategoryCollection($categories,  app()->getLocale());
        return $categories;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
