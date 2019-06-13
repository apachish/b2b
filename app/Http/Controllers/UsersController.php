<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $leads = $user->leads()->take(5)->get();
        $requests = \App\Request::whereHas('lead',function ($leads){
            $leads->where('user_id',auth()->id());
        })->get();
        return view('users.profile',compact('user','leads','requests'));
    }

    public function edit()
    {
        $user = auth()->user();
        $sellers = Seller::all();
        return view('users.edit',compact('user','sellers'));
    }

    public function update(Request $request)
    {

    }
}
