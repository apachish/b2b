<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->get('limit',15);
        $testimonials = Testimonial::whereStatus(1)->orderBy('created_at', 'DESC')->paginate();
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('image','!=',0)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('image','!=',0)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();

        return view('testimonials.index',compact('testimonials','limit','banner_button','banner_left'));
    }

    public function show(Request $request,$slug){
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('image','!=',0)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('image','!=',0)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();

        $testimonial = Testimonial::whereSlug($slug)->whereStatus(1)->first();
        return view('testimonials.show',compact('testimonial','banner_left','banner_button'));

    }
}
