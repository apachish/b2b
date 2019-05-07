<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable= ['name','email','status','mail_status','mail_sent_date','member_id'];
}
