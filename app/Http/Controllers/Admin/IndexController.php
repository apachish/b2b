<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $class = ['progress-bar-success', 'progress-bar-warning', 'progress-bar-danger'];

        $params = [
            'total_visitor' => 0,
            'date' => 0,
            'today_visitor' => 0,
            'new_register' => 0,
            'count_user' => 0,
            'count_user_featured' => 0,
            'locale' => 0,
            'total_lead' => 1,
            'total_lead_today' => 0,
            'total_lead_new' => 0,
            'total_lead_active' => 0,
            'total_lead_unactive' => 0,
            'total_new_enquiry' => 0,
            'total_lead_pending' => 0,
            'total_lead_approved' => 0,
            'total_lead_rejected' => 0,
            'total_banner' => 0,
            'total_banner_active' => 0,
            'total_banner_unactive' => 0,
            'total_advertise' => 0,
            'total_advertise_active' => 0,
            'total_advertise_unactive' => 0,
            'message_count' => 0,
            'message_count_request' => 0,
            'message_count_testimonial' => 0,
            'message_count_comment_article' => 0,
            'info_sale_buy' => 0,
            'info_all_Category' => 0,
            'info_adv_banner' => 0,
            'info_adv_banner_label' => 0,
            'memberships' => [],
            'info_adv_banner' => [],
            'info_adv_banner_label' => [],
            'info_all_Category' => [],
            'info_sale_buy' => [],
            'info_location_lead' => [],
            'class' => $class,
        ];
        return view('admin.index',$params);

    }
}
