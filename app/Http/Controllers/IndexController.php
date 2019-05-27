<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Category;
use App\CategoryMenu;
use App\Lead;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class IndexController extends Controller
{
    public function index()
    {
        $banner_right = Banner::where('banner_position', Banner::BANNER_POSITION_RIGHT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(4)->get();
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();
        $home_scrolling = Banner::where('banner_position', Banner::BANNER_POSITION_HOME_SCROLLING)->where('status', 1)->orderByRaw('RAND()')->take(4)->get();
        $leads_buy = Lead::whereAdType('buy')->whereStatus(1)->where('approval_status', 2)->orderByRaw('RAND()')
            ->where('publish_at', '>', Carbon::now()->subDay(3))
            ->take(30)->get();
        $leads_sell = Lead::whereAdType('sell')->whereStatus(1)->where('approval_status', 2)->orderByRaw('RAND()')
            ->where('publish_at', '>', Carbon::now()->subDay(3))
            ->take(30)->get();
        $products_featured = Lead::whereStatus(1)->with(['user', 'medias' => function ($q) {
            $q->where('is_default', true);
        },'categories'])->where('approval_status', 2)->orderByRaw('RAND()')->take(30)->get();

        $categories = Category::get()->toTree();
        $period_array = [
            ["start" => 0, 'finish' => 18],
            ["start" => 18, 'finish' => 36],
            ["start" => 33, 'finish' => 51],
        ];
        $period = $period_array[0];
        $categories_images = Category::whereFeature(true)->where('image', '!=', 'noImage.png')->get()->toTree();
        $company_featured = User::with('category')->where('featured_company',1)->whereStatus(1)->orderByRaw('RAND()')->take(6)->get();
        $testimonials = Testimonial::whereStatus(1)->orderBy('created_at', 'desc')->take(10)->get();
        $articles =  Article::with('user')->whereStatus(1)->orderBy('sort_order', 'Asc')->take(2)->get();
        return view('index', compact('banner_right', 'home_scrolling', 'banner_left', 'banner_button'
            , 'period', 'categories_images',
            'leads_buy',
            'leads_sell',
            'categories', 'company_featured', 'testimonials', 'articles',
            'products_featured'));

    }

    public function reCaptcha(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => '',
            ],
            'data' => ['captcha' => captcha_src('flat')]
        ], 200);
    }

    public function siteMap(Request $request){
        $portal = \Cache::get('portal');
        $menus = CategoryMenu::with('menus')->where('locale', app()->getLocale())
            ->whereHas('menus', function ($q) {
                $q->where('status', 1);
            })->whereHas('portals', function ($q) use ($portal) {
                $q->where('portal_id', $portal->id);
            })
            ->get();
        return view('site-map',compact('menus'));
    }
}
