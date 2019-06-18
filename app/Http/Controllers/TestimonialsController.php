<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-location')->only('store');

    }
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

    public function store(Request $request)
    {
        $validator = Validator()->make($request->all(), [
            'captcha_request' => 'required|captcha',
            'poster_name' => 'required|max:150',
            'email' => 'required|email',
            'description'=>'required',
        ]);
        return response()->json([
            'status' => 'failed',
            'meta' => [
                'code' => 400,
                'message' => $validator->errors(),
            ],
            'data' => ['captcha'=>captcha_src('flat')]
        ], 200);
        $ip_info = \Cache::get($request->ip());

        Testimonial::create([
            'city_id'=>data_get($ip_info,'city_id'),
            'poster_name'=>$request->poster_name,
            'company'=>$request->company,
            'email'=>$request->email,
            'description'=>$request->description,
            'locale'=>app()->getLocale(),
        ]);
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.successfully to send Text!'),
            ],
            'data' => ['captcha'=>captcha_src('flat')]
        ], 200);
    }
}
