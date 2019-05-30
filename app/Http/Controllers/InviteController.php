<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function form(Request $request)
    {
        $text = $request->text;
        $link= $request->link;
        return view('invite.refer-friend',compact('text','link'));

    }
    public function send(Request $request){
        $validator = Validator()->make($request->all(), [
            'captcha_newsletter' => 'required|captcha',
            'subscriberEmail' => 'required|email',
            'subscriberName' => 'required',
            'status' => 'required',
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
    }
}
