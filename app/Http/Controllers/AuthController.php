<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Events\RegisterEvent;
use App\State;
use App\Traits\AES;
use App\User;
use Cache;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers{
        login as protected parent_login;
        }
    protected $redirectTo = '/members/my-account';
    public function __construct()
    {
        $this->middleware('check-location');

    }

    public function showLoginForm(Request $request)
    {

        $ip_info = \Cache::get($request->ip());
        $countryCode = strtolower(data_get($ip_info,'countryCode','IR'));
        $email = Cache::get('email','');
        $password = Cache::get('password','');
        return view('users.login',compact('email','password','countryCode'));

    }
    public function login(Request $request)
    {
        $this->parent_login($request);
        Cache::forever('email', $request->email);
        Cache::forever('password', $request->password);
        return response()->json([
            'status' => 'success',
            'data' => ['send' => 'ok']
        ], 200, []);
    }


    public function register(Request $request)
    {
        $ip_info = Cache::get($request->ip());
        $countryCode = strtolower(data_get($ip_info, 'countryCode', 'IR'));
        return view('users.register', compact('countryCode'));


    }

    public function checkRegister(Request $request)
    {
        $validator = Validator()->make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required', 'string', 'exists:countries,iso_code_2'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'data' => $validator->errors()
            ], 200, []);
        }
        $email = $request->email;
        $country = $request->country;
        $country = Country::where('iso_code_2', $country)->first()->id;

        return response()->json([
            'status' => 'success',
            'data' => ['send' => '?email=' . $email . '&country=' . $country]
        ], 200, []);
    }

    public function getInfo(Request $request)
    {
        $email = $request->email;
        $country = Country::find($request->country);
        $states = State::where('country_id', $country->id)->get();
        $category = Category::where('parent_id', null)->get();
        $ip_info = Cache::get($request->ip());
        $city = data_get($ip_info, 'state_id');

        return view('users.register_final', compact('email', 'country', 'states', 'category', 'city'));

    }

    public function store(Request $request)
    {
        $validator = Validator()->make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'unique:users'],
            'country_id' => ['required', 'string', 'exists:countries,id'],
            'state_id' => ['required', 'string', 'exists:states,id'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'data' => $validator->errors()
            ], 200, []);
        }
        $key = '889ShahiApachisCom1365';
        $pass = substr(md5(rand(999999, 9999999)), 0, 7);
        $username = uniqid('user_');
        $login = $username . ':' . $pass;
        $key = base64_decode(substr($key, 7));
       $crypt =  Crypt::generateKey($key);
        $temp = Crypt::encryptString($login);
        $portal = Cache()->get("portal_".session()->getId());

        //$crypt->decrypt('value');
        $user = User::create(
           array_merge(['username'=>$username,'password'=>Hash::make($pass),'token_key'=>$temp,'portal_id'=>$portal->id],
            $request->only(['first_name', 'last_name', 'email', 'mobile', 'country_id', 'state_id', 'category_id'])
           )
        );
        event(new Registered($user));
        $data = array(
            'site_link' => config('global.email.site_link'),
            'site_name' => app()->getLocale() == 'fa' ? config('global.email.site_name_fa'): config('global.email.site_name'),
            'admin_email' => config('global.email.admin_email'),
            'admin_name' => app()->getLocale() == 'fa' ? config('global.email.admin_name_fa'): config('global.email.admin_name'),
            'user' => $user->toArray(),
            'email' => $user->email,
            'username' => $user->username,
            'password' => $pass,
            'link' => $request->user()->markEmailAsVerified()
        );
        dd($data);
        event(new RegisterEvent($user,$data));
        return response()->json([
            'status' => 'success',
            'data' => ['messages' => __('Sign up Done Please check your email')]
        ], 200, []);
    }

    public function checkLogin(Request $request)
    {

        if (auth()->check()) {
            return response()->json([
                'status' => 'success',
                'meta' => [
                    'code' => 200,
                    'message' => true,
                ],
                'data' => [
                    'login' => true
                ]
            ], 200);
        }
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 401,
                    'message' => true,
                ],
                'data' => [
                    'login' => false
                ]
            ], 200);

    }
}
