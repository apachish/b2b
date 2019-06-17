<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreAdvertisment;
use App\PagePosition;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function create()
    {
        $positions = PagePosition::all();
        $categories = Category::where('parent_id', Null)->where('status', 1)->get();

        return view('banners.create',compact('positions','categories'));
    }
    public function store(StoreAdvertisment $request)
    {

        flash(__('messages.Your banner request has been sent successfully.'));

        return redirect('advertisement');
    }
}
