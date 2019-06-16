<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\SearchCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $list = Category::query();
        $search = data_get($request,'term');
        if ($search) {
            $list->where('name', 'like', "%" . $search . "%")
                ->orWhere('name_fa', 'like', "%" . $search . "%");

        }
        $list = $list->get()->take(5);
        return new SearchCollection($list);
    }
}
