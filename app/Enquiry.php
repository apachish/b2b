<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = ['type','member_id','subject','email','name','company_name','phone_number'
        ,'mobile','fax_number','address','zip_code','message','country_id',
        'state_id','city_id','status','reply_status','locale'];
}
