<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Page;
use App\Testimonial;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request,$page_slug=null)
    {
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $testimonials = Testimonial::whereStatus(1)->orderBy('created_at', 'desc')->take(10)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();

        $order_by = $request->order_by?:'DESC';
        if ($page_slug) {
            $page = Page::whereSlug($page_slug)->whereStatus(1)->whereLocale(app()->getLocale())->first();
            if($page == null) abort(404);
            return view('pages.show', compact('page','banner_left','testimonials','banner_button'));

        } else {
            $pages = Page::whereStatus(1)->whereLocale(app()->getLocale())->orderBy('created_at', $order_by)->simplePaginate(10);
            return view('pages.index', compact('pages','order_by','banner_left','testimonials','banner_button'));

        }
    }
}
