<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $banner_right = Banner::where('banner_position','right')->where('status',1)->get();
        $home_scrolling = Banner::where('banner_position','home_scrolling')->where('status',1)->get();
        return view('index',compact('banner_right','home_scrolling'));

    }
}
