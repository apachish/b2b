<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('users.login');

    }
    public function email(){
        return view('users.login');

    }
    public function register(){
        return view('users.register');


    }
    public function getInfo(){
        return view('users.register');


    }
    public function checkLogin(Request $request){

        if(auth()->check()){
            return response()->json([
                'status' => 'success',
                'meta' => [
                    'code' => 200,
                    'message' => true,
                ],
                'data' => [
                    'login'=>true
                ]
            ], 200);
        }
        if(auth()->check()){
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 401,
                    'message' => true,
                ],
                'data' => [
                    'login'=>false
                ]
            ], 401);
        }
    }
}
