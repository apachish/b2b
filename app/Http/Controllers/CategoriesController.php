<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CategoriesController extends Controller
{
    public function index(Request $request, $slug_categories = null)
    {
        $compact = [];
        $category =  [];
        $compact['page'] = null;
        $compact['banner_button'] = '';
        $compact['banner_middle'] = '';
        $compact['banner_middle_2'] = '';
        $compact['banner_left'] = '';
        $compact['banner_left_2'] = '';
        $compact['type_featured'] = 2;
        $compact['products_featured1'] = [];
        $compact['testimonials'] = [];
        $compact['companies'] = [];
        $compact['params'] = [];
        $compact['breadcrumbs'] = [];
        $compact['page_name'] = "";
        $compact['category_slug'] = $slug_categories;

        if ($slug_categories) {
            $category = Category::Where('slug_fa', $slug_categories)->orWhere('slug', $slug_categories)->withDepth()->with('ancestors')->firstOrFail();
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
            $page = $slug_categories;
            $params['slug'] = $slug_categories;

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
        $compact['categories'] = $categories;
        $compact['category'] = $category;
        if ($category && $category->depth == 1) {
            $compact['seller_type'] = config('global.seller_type');
            $compact['locations'] = [];
            $compact['type'] = "";
            return view('categories.subCategory', $compact);
        }
        if ($category && $category->depth == 2) {
            $compact['type'] = "";
            $compact['items'] = [];
            $compact['countItem'] = 0;
            $list_Categories_side = Category::with('ancestors')->find($category->parent_id);
            $list_Categories_side['siblings'] = $list_Categories_side->siblings()->take(9)->get();
            $compact['list_Categories_side'] = $list_Categories_side;
            return view('categories.subSubCategory', $compact);
        } else {
            return view('categories.index', $compact);
        }

    }
}
