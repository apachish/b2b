<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Ip;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check-location')->only('postRequest');

    }
    public function postRequest(Request $request)
    {

        $validator = Validator()->make($request->all(), [
            'captcha_request' => 'required|captcha',
            'email' => 'required|email',
            'name' => 'required',
            'mobile' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 200,
                    'message' => $validator->errors(),
                ],
                'data' => ['captcha'=>captcha_src('flat')]
            ], 200);
        }
        $user = auth()->user();
        $member_id = $user ? $user->id : null;
        $ip_info = Cache::get($request->ip());
        $enquiry = Enquiry::create([
            'type'=>4,
            'member_id'=>$member_id,
            'email'=>$request->email,
            'name'=>$request->name,
            'company_name'=>$request->company_name,
            'mobile'=>$request->mobile,
            'country_id'=>$request->country,
            'state_id'=>data_get($ip_info,'state,id'),
            'city_id'=>data_get($ip_info,'city,id'),
            'status'=>1,
            'reply_status'=>"N",
            'locale'=>app()->getLocale()
        ]);
        if($enquiry == null){
            return response()->json([
                'status' => 'success',
                'meta' => [
                    'code' => 200,
                    'message' => __('Can Not Send Request'),
                ],
                'data' => ['captcha'=>captcha_src('flat')]
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __('Request posted successfully'),
            ],
            'data' => ['captcha'=>captcha_src('flat')]
        ], 200);

    }
}
