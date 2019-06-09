<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['plan_name','price','duration','product_upload','no_of_category','no_of_enquiry','locale','status'];
}
