<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerInfo extends Model
{
    protected $fillable = ['banner_id','name','email','company_name','phone_number','mobile','comment'];
}
