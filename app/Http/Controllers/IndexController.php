<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class IndexController extends Controller
{
    public function index(){
        $translate = LanguageLine::find(512);
        if($translate == null) return abort(404);
        $translate->update(['text'=>['en'=>'Join Free','fa'=>'ورود به سایت']]);
        $banner_right = Banner::where('banner_position','right')->where('status',1)->get();
        $banner_left  = Banner::where('banner_position','left')->where('status',1)->get();
        $banner_left_2   = Banner::where('banner_position','left')->where('status',1)->get();
        $banner_button    = Banner::where('banner_position','button')->where('status',1)->get();
        $home_scrolling = Banner::where('banner_position','home_scrolling')->where('status',1)->get();
        $count_buy = 0;
        $buy_leads= [];
        $count_sell = 0;
        $sell_leads= [];
        $products_featured1 =[];
        $products_featured2 =[];
        $products_featured3 =[];
        $categories = Category::get()->toTree();
        $period_array = [
            ["start"=>0,'finish'=>18],
            ["start"=>18,'finish'=>36],
            ["start"=>33,'finish'=>51],
        ];
        $period = $period_array[rand(0,2)];
        $companies  =[];
        $testimonials =[];
        $articles =[];
        return view('index',compact('banner_right','home_scrolling','banner_left','banner_left_2','banner_button'
            ,'count_buy','period',
            'buy_leads','count_sell','sell_leads',
            'categories','companies','testimonials','articles',
            'products_featured1','products_featured2','products_featured3'));

    }
    public function reCaptcha(Request $request){
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => '',
            ],
            'data' => ['captcha'=>captcha_src('flat')]
        ], 200);
    }
}
