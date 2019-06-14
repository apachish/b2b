<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MembershipsController extends Controller
{
    public function index()
    {
        $plans = Membership::whereLocale(app()->getLocale())->whereStatus(1)->get();
        return view('memberships.index',compact('plans'));
    }

    public function pay(Request $request,$plan_id)
    {
        $plan = Membership::where('id', $plan_id)->where('status', 1)->where('locale', app()->getLocale())->firstOrFail();
        $content = '';

        $membership = Order::where('member_id', auth()->id())->where('upgrade_status', 'New')->where('exp_date', '>', Carbon::now())->first();
        if ($membership == null  || ($membership && !$membership->price)) {
            do {
                $order_id = "INVOICE-" . Str::random(6);
            } while (Order::whereOrderNo($order_id)->count() > 0);
            if ($plan) {
                $membership = Order::create([
                    'order_no' => $order_id,
                    'member_id' => auth()->id(),
                    'plan_id' => $plan->id,
                    'plan_name' => $plan->plan_name,
                    'price' => $plan->price,
                    'duration' => $plan->duration,
                    'allowed_products' => $plan->product_upload,
                    'category_allowed' => $plan->no_of_category,
                    'allowed_request' => $plan->no_of_enquiry,
                    'activation_date' => Carbon::now(),
                    'exp_date' => Carbon::now()->addMonth($plan->duration),
                    'payment_status' => '0',
                    'payment_mode' => 'Paypal',
                    'upgrade_status' => 'New'
                ]);
            }

        }else{
            flash(__('messages.You currently have a special membership'));

            return redirect('member/membership_plans');
        }
        return view('memberships.pay',compact('order_id','content'));

    }

    public function payment(Request $request,$order_id)
    {
        flash(__('messages.Unable to connect to the bank'));

        return redirect('member/membership_plans');

    }
}
