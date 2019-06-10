<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $leads = $user->leads()->take(5)->get();
        $requests = [];
        return view('users.profile',compact('user','leads','requests'));
    }
}
