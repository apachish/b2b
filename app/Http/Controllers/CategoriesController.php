<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CategoriesController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        $page = null;
        $banner_button = '';
        $banner_middle = '';
        $banner_middle_2 = '';
        $banner_left = '';
        $banner_left_2 = '';
        $type_featured = 2;
        $products_featured1 = [];
        $testimonials = [];
        $companies = [];
        $params = [];
        $category = [];
        $breadcrumbs = [];
        $page_name = "";
        if ($slug) {
            $category = Category::Where('slug_fa', $slug)->orWhere('slug', $slug)->withDepth()->firstOrFail();
            $id = $category->id;
            $categories = Category::withDepth()->where('parent_id', $category->id)->with(['descendants' => function ($query) {
                return $query->take(5);
            }]);
            if ($request->character && app()->getLocale() == 'en')
                $categories->where('name', 'like', $request->character . "%");
            elseif ($request->character && app()->getLocale() == 'fa') {
                $character_exception = ['ا' => ['ا', 'آ', 'أ']];
                if (array_key_exists($request->character, $character_exception)) {
                    $categories->where(function ($query) use ($character_exception, $request) {
                        foreach ($character_exception[$request->character] as $i => $charchter) {
                            if ($i == 0)
                                $query->Where('name_fa', 'like', $charchter . "%");
                            else
                                $query->orWhere('name_fa', 'like', $charchter . "%");

                        }
                    });

                } else {
                    $categories->where('name_fa', 'like', $request->character . "%");

                }
            }
            $categories = $categories->paginate(18);
            $page = $slug;
            $params['slug'] = $slug;

        } else {
            $categories = Category::whereParentId(Null)->with(['descendants' => function ($query) {
                return $query->take(5);
            }]);

            if ($request->character && app()->getLocale() == 'en')
                $categories->where('name', 'like', $request->character . "%");
            elseif ($request->character && app()->getLocale() == 'fa') {
                $character_exception = ['ا' => ['ا', 'آ', 'أ']];
                if (array_key_exists($request->character, $character_exception)) {
                    $categories->where(function ($query) use ($character_exception, $request) {
                        foreach ($character_exception[$request->character] as $i => $charchter) {
                            if ($i == 0)
                                $query->Where('name_fa', 'like', $charchter . "%");
                            else
                                $query->orWhere('name_fa', 'like', $charchter . "%");

                        }
                    });

                } else {
                    $categories->where('name_fa', 'like', $request->character . "%");

                }
            }

            $categories = $categories->paginate(55);
        }
        if ($category && $category->depth == 1) {
            $seller_type = config('global.seller_type');
            $locations = [];
            $type = "";
            return view('categories.subCategory', compact('categories', 'page', 'banner_button', 'params', 'banner_middle', 'banner_middle_2', 'banner_left',
                'banner_left_2', 'seller_type', 'locations', 'type',
                'type_featured', 'products_featured1', 'companies', 'testimonials', 'breadcrumbs', 'page_name', 'id'));
        }
        if ($category && $category->depth == 2) {
            $type = "";
            $items = [];
            $countItem = 0;
            $list_Categories_side = Category::with('ancestors')->find($category->parent_id);
            $list_Categories_side['siblings'] =$list_Categories_side->siblings()->take(9)->get();
//            $list_Categories_side = Category::with(['descendants' => function ($query) use ($category) {
//                $query->where('parent_id',$category->parent_id);
//                $query->take(10);
//            }])->ancestorsOf($category->parent_id);
            return view('categories.subSubCategory', compact('categories', 'page', 'banner_button', 'params', 'banner_middle', 'banner_middle_2', 'banner_left',
                'banner_left_2','list_Categories_side',
                'type_featured', 'products_featured1', 'companies', 'testimonials', 'breadcrumbs', 'page_name', 'id', 'category', 'type','items','countItem'));
        } else {
            return view('categories.index', compact('categories', 'page', 'banner_button', 'params', 'banner_middle', 'banner_middle_2', 'banner_left',
                'banner_left_2',
                'type_featured', 'products_featured1', 'companies', 'testimonials'));
        }

    }
}
