<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Country;
use App\Seller;
use App\State;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $leads = $user->leads()->take(5)->get();
        $requests = \App\Request::whereHas('lead', function ($leads) {
            $leads->where('user_id', auth()->id());
        })->get();
        return view('users.profile', compact('user', 'leads', 'requests'));
    }

    public function edit()
    {
        $user = auth()->user();
        $sellers = Seller::all();
        $categories = Category::where('parent_id', Null)->where('status', 1)->get();
        $deals_in = Category::with('descendants')->where('parent_id', $user->category_id)->get();
        $countries = Country::where('status', 1)->get();
        $states = $user->country_id ? State::where('country_id', $user->country_id)->get() : [];
        $cites = $user->state_id ? City::where('state_id', $user->state_id)->get() : [];
        return view('users.edit', compact('user', 'sellers', 'categories', 'deals_in', 'countries', 'states', 'cites'));
    }

    public function update(Request $request)
    {
        User::$section = 'logo';
        User::$path = public_path() . '/images/' . User::$section . '/';
        $user = auth()->user();
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->last_name,
            'company_logo' => $request->last_name,
            'category_id' => $request->category_id,
            'company_details' => $request->company_details,
            'company_logo' => $request->file('company_logo')?User::upload($request->file('company_logo')):$user->company_logo,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'pincode' => $request->pincode,
            'phone_number' => $request->phone_number,
            'mobile' => $request->mobile,
            'website' => $request->website,
        ]);
        $diff_seller = array_diff($user->sellers->pluck('id')->toArray(),$request->sellerType);
        $user->sellers()->detach($diff_seller);
        $user->sellers()->syncWithoutDetaching($request->sellerType);
        $diff_dealsIn = array_diff($user->categories->pluck('id')->toArray(),$request->dealsIn);
        $user->categories()->detach($diff_dealsIn);
        $user->categories()->syncWithoutDetaching($request->dealsIn);
        return redirect(route('members.my-account'));
    }

    public function removeAccountForm(Request $request)
    {
        $portal = \Cache::get('portal');
        $meta_data = json_decode($portal->meta_data);
        $text = app()->getLocale() == 'fa' ? data_get($meta_data, 'text_deactive_fa', "<p><br></p>") : data_get($meta_data, 'text_deactive', "<p><br></p>");
        return view('users.remove_account', compact('text'));
    }

    public function removeAccount(Request $request)
    {
        return redirect('home');
    }

    public function changePasswordForm(Request $request)
    {
        return view('users.change_password');
    }

    public function changePassword(Request $request)
    {
        return redirect('home');

    }
}
