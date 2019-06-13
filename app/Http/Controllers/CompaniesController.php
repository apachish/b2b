<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Lead;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {

    }

    public function show(Request $request,$slug_companies)
    {
        $limit = $request->get('limit',10);
        $company = User::where('slug',$slug_companies)->firstOrFail();
        $categories = Category::orderByRaw('RAND()')->take(10)->get();
        $adType  = $request->get('adType','buy');
        $membership = Order::where('member_id', auth()->id())->where('upgrade_status', 'New')->where('exp_date', '>', Carbon::now())->first();
        $leads = Lead::whereHas('user',function ($query) use ($company){
            $query->where('user_id',$company->id);
        })->where('ad_type',$adType);
        $countItem = $leads->count();
        $leads = $leads->paginate($limit);
        $banner_middle = Banner::where('banner_position', Banner::BANNER_POSITION_MIDDLE)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(1)->get();
        $banner_button = Banner::where('banner_position', Banner::BANNER_POSITION_BOTTOM)->where('status', 1)->orderByRaw('RAND()')->take(2)->get();
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $company_featured = User::with('category')->where('featured_company',1)->whereStatus(1)->orderByRaw('RAND()')->take(6)->get();

        return view('companies.show',compact('company','categories','adType','membership','leads','countItem',
            'banner_left','banner_middle','company_featured','banner_button'));
    }
}
