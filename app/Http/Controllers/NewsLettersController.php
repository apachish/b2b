<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsLettersController extends Controller
{
    public function create()
    {
        return view('newsletters.create');
    }
    public function send(Request $request)
    {
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
        $user = auth()->user();
        $member_id = $user ? $user->id : null;
        $newsletter = Newsletter::whereEmail($request->subscriberEmail)->first();
        if ($newsletter && $newsletter->status == $request->status && $request->status == 1) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 1000,
                    'message' => __('Previously, your subscription has been done in our newsletter'),
                ],
                'data' => ['captcha'=>captcha_src('flat')]
            ], 200);
        } elseif ($newsletter && $newsletter->status == $request->status && $request->status == 0) {
            return response()->json([
                'status' => 'failed',
                'meta' => [
                    'code' => 1000,
                    'message' => __('Previously, your subscription to our newsletter has been disabled'),
                ],
                'data' => ['captcha'=>captcha_src('flat')]
            ], 200);
        }
        Newsletter::updateOrCreate(['email' => $request->subscriberEmail],
            ['name' => $request->subscriberName, 'status' => $request->status, 'member_id' => $member_id]);
        $message = $request->status ? 'welcome to Newsletter BuySellYab' : 'UnSubscribe Newsletter BuySellYab';
        return response()->json([
            'status' => 'success',
            'meta' => [
                'code' => 200,
                'message' => __($message),
            ],
            'data' => ['captcha'=>captcha_src('flat')]
        ], 200);

    }
}
