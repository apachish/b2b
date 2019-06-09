<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no', 'member_id', 'plan_id', 'plan_name', 'post_products', 'posted_in_category',
        'category_allowed', 'allowed_products','no_of_enquiry','duration','price',
        'exp_date','activation_date','payment_status','payment_mode','upgrade_status'];
}
