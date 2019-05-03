<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Excel\ExcelImport;
use App\Http\Resources\CategoryCollection;
use App\Imports\CategoryImport;
use App\Imports\CategoryImport1;
use App\Imports\FirstSheetImport;
use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parent = null;
        $depth = 0;
        if ($request->id) {
            $list = Category::descendantsOf($request->id)->paginate(50);
            $parent = $request->id;
            $result = Category::withDepth()->find($request->id);

            $depth = $result->depth;
        } else {
            $categories = Category::whereNull('parent_id')->paginate(55);

        }
        $search = [
            "order" => false,
            "by" => false,
            "status" => false,
            "text" => null,
            "feature" => false
        ];
        $badge = ['badge-success', 'badge-danger', 'badge-info', 'badge-warning'];
        $params = [
            'parent' => $parent
            , 'sub_cat' => $depth
            , 'depth' => $depth
        ];
        $count = $categories->count();
        foreach ($categories as $category) {
            $id = $category->id;
            $item = $category;
            $item->title = app()->getLocale() == 'fa' ? $category->name_fa : $category->name_fa;
            $item->noProduct = Lead::with('categories')
                ->whereHas('categories', function ($q) use ($id) {
                    $q->where('category_id', $id);
                })->count();
            $item->noSubCategory = \App\Category::descendantsOf($id)->count();
            $item->url = url("admin/categories/{$id}");
            $item->url_edit = url("admin/categories/{$id}/edit");
            $item->url_product = url('admin/products') . "?category={$id}";
            $list[] = $item;
        }
        $categories = $list;
        return view('admin.categories.index', compact('categories', 'search', 'badge', 'params', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
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
            'name' => 'required|max:100',
            'name_fa' => 'required|max:100',
        ]);
        $category = Category::create([
            'name' => $request->name,
            'name_fa' => $request->name_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'feature' => $request->feature
            , 'parent_id' => $request->category2 ? $request->category2 : $request->category
        ]);
        Category::$section = 'category';
        Category::$id = $category->id;
        $image = Category::upload($request->image);
        $category->update(['image' => $image]);
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parent = null;
        $depth = 0;
        if ($id) {
            $categories = Category::descendantsOf($id);
            $parent = $id;
            $result = Category::withDepth()->find($id);

            $depth = $result->depth;
        } else {
            abort(404);
        }
        $search = [
            "order" => false,
            "by" => false,
            "status" => false,
            "text" => null,
            "feature" => false
        ];
        $badge = ['badge-success', 'badge-danger', 'badge-info', 'badge-warning'];
        $params = [
            'parent' => $parent
            , 'sub_cat' => $depth
            , 'depth' => $depth
        ];
        $count = $categories->count();
        $list = $this->categories($categories, true, true);
        $categories = $list['list'];
        $count_products = $list['count_products'];

        return view('admin.categories.index', compact('categories', 'search', 'badge', 'params', 'count', 'count_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::whereNull('parent_id')->get();
        $categories = $this->categories($categories)['list'];
        $result = Category::withDepth()->find($id);
        $subcategories = [];
        $parent = Category::ancestorsOf($id);

        if ($result->depth == 2) {
            $subcategories = Category::descendantsOf($parent[0]->id);
            $subcategories = $this->categories($subcategories)['list'];
        }

        return view('admin.categories.edit', compact('category', 'categories', 'subcategories', 'parent'));
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
        $category = Category::find($id);
        if (!$category) abort(404);
        $request->validate([
            'name' => 'required|max:100',
            'name_fa' => 'required|max:100',
        ]);
        //update
        Category::$section = 'category';
        Category::$id = $id;
        $image = Category::upload($request->image);
        $category->update([
            'name' => $request->name,
            'name_fa' => $request->name_fa,
            'image' => $image,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'feature' => $request->feature
            , 'parent_id' => $request->category2 ? $request->category2 : $request->category
        ]);
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) abort(404);

        $category->delete();
    }

    public function formUpload()
    {
        return view('admin.categories.upload_excel');

    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $path = '/uploads/excel/';
            $ext = $file->getClientOriginalExtension();
            $filename = 'category_excel_' . Carbon::now() . '.' . $ext;
            $file->move(public_path($path), $filename);
        }
        $import_excel = new CategoryImport();
        $import_excel->sheet=[$import_excel];
        $category = Excel::import($import_excel, public_path($path . $filename));
        $excel_import = with(new ExcelImport(public_path($path . $filename),$import_excel->category_array))->import();
dd($excel_import);
        return redirect('admin/categories');

    }


    public function move()
    {

        $tbl_categories = \DB::table('tbl_categories')->get();


        foreach ($tbl_categories as $category) {
            if (!$category->parent && !$category->parent_id) {
                $category_first = Category::create([
                    'name' => htmlspecialchars_decode($category->category_name),
                    'name_fa' => htmlspecialchars_decode($category->category_name_fa),
                    'image' => $category->category_image ?: "noImage.png",
                    'friendlyUrl' => Str::slug($category->category_name),
                    'description' => htmlspecialchars_decode($category->category_description),
                    'description_fa' => htmlspecialchars_decode($category->category_description_fa),
                    'sort_order' => $category->sort_order,
                    'status' => $category->status ?: false,
                    'meta_title' => $category->meta_title,
                    'meta_keywords' => $category->meta_keywords,
                    'meta_description' => $category->meta_description,
                    'feature' => $category->feature ?: false,
                    'parent_id' => $category->parent_id

                ]);
                $category2 = \DB::table('tbl_categories')->where('parent_id', $category->category_id)->get();
                foreach ($category2 as $category22) {
                    if (!$category22->parent && $category22->parent_id == $category->category_id) {

                        $category_second = Category::create([
                            'name' => htmlspecialchars_decode($category22->category_name),
                            'name_fa' => htmlspecialchars_decode($category22->category_name_fa),
                            'friendlyUrl' => Str::slug($category22->category_name),

                            'image' => $category22->category_image ?: "noImage.png",
                            'description' => htmlspecialchars_decode($category22->category_description),
                            'description_fa' => htmlspecialchars_decode($category22->category_description_fa),
                            'sort_order' => $category22->sort_order,
                            'status' => $category22->status ?: false,
                            'meta_title' => $category22->meta_title,
                            'meta_keywords' => $category22->meta_keywords,
                            'meta_description' => $category22->meta_description,
                            'feature' => $category22->feature ?: false,
                            'parent_id' => $category_first->id

                        ]);
                    }
                    $category3 = \DB::table('tbl_categories')->where('parent_id', $category->category_id)->where('parent', $category22->category_id)->get();

                    foreach ($category3 as $category33) {
                        if ($category33->parent == $category22->category_id && $category33->parent_id == $category->category_id) {

                            Category::create([
                                'name' => htmlspecialchars_decode($category33->category_name),
                                'name_fa' => htmlspecialchars_decode($category33->category_name_fa),
                                'friendlyUrl' => Str::slug($category33->category_name),
                                'image' => $category33->category_image ?: "noImage.png",
                                'description' => htmlspecialchars_decode($category33->category_description),
                                'description_fa' => htmlspecialchars_decode($category33->category_description_fa),
                                'sort_order' => $category33->sort_order,
                                'status' => $category33->status ?: false,
                                'meta_title' => $category33->meta_title,
                                'meta_keywords' => $category33->meta_keywords,
                                'meta_description' => $category33->meta_description,
                                'feature' => $category33->feature ?: false,
                                'parent_id' => $category_second->id

                            ]);
                        }
                    }
                }
            }
        }
    }

    private function categories($categories, $noSubCategory = false, $noProduct = false)
    {
        $count_products = 0;
        $list = [];
        foreach ($categories as $category) {
            $id = $category->id;
            $item = $category;
            $item->title = app()->getLocale() == 'fa' ? $category->name_fa : $category->name_fa;
            if ($noSubCategory) $item->noSubCategory = \App\Category::descendantsOf($id)->count();

            if ($noProduct) {
                $item->noProduct = Lead::with('categories')
                    ->whereHas('categories', function ($q) use ($id) {
                        $q->where('category_id', $id);
                    })->count();
                $count_products += $item->noProduct;

            }
            $item->url = url("admin/categories/{$id}");
            $item->url_edit = url("admin/categories/{$id}/edit");
            $item->url_product = url('admin/products') . "?category={$id}";
            $list[] = $item;
        }
        return ['list' => $list, "count_products" => $count_products];
    }

}
