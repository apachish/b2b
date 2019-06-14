<?php

namespace App\Http\Controllers;

use App\Banner;
use App\CategoryFaq;
use App\Faq;
use App\Testimonial;
use Illuminate\Http\Request;

class HelpsController extends Controller
{
    public function index()
    {
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();
        $testimonials = Testimonial::whereStatus(1)->orderBy('created_at', 'desc')->take(10)->get();
        $category_faqs = CategoryFaq::with('faqs')->withCount('faqs')->where('locale', app()->getLocale())->get();
        return view('help.index', compact('testimonials', 'banner_button', 'banner_left', 'category_faqs'));
    }

    public function rate(Request $request, $id_faq)
    {
        $faq = Faq::find($id_faq);
        if ($faq == null) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 400,
                    'message' => __('messages.not found faq'),
                ],
                'data' => []
            ], 200);
        }
        $meta_data = json_decode($faq->meta_data, true);
        $session_id = $request->session()->getId();
        if ($meta_data && array_key_exists($session_id, $meta_data)) {
            if ($meta_data[$session_id] != $request->rate) {
                $faq->decrement($meta_data[$session_id]);
                $faq->increment($request->rate);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'meta' => [
                        'code' => 400,
                        'message' => __('messages.Your comment has already been submitted'),
                    ],
                    'data' => []
                ], 200);
            }
        } else {
            $faq->increment($request->rate);
        }
        $meta_data[$session_id]=$request->rate;
        $faq->update(['meta_data'=>json_encode($meta_data)]);
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('messages.Your comment has been registered'),
            ],
            'data' => [
                'yes' => $faq->yes,
                'no' => $faq->no
            ]
        ], 200);


    }
}
