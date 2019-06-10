<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['lead_id','member_id','name','company_name','email','mobile','comments','status','reply'];
}
