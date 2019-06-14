<?php

namespace App\Http\Controllers;

use App\Banner;
use App\CategoryFaq;
use App\Testimonial;
use Illuminate\Http\Request;

class HelpsController extends Controller
{
    public function index()
    {
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();
        $testimonials = Testimonial::whereStatus(1)->orderBy('created_at', 'desc')->take(10)->get();
        $category_faqs = CategoryFaq::with('faqs')->withCount('faqs')->where('locale',app()->getLocale())->get();
        return view('help.index',compact('testimonials','banner_button','banner_left','category_faqs'));
    }
}
