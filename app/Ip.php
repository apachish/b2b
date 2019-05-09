<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $fillable = ['ip','member_id','country_id','state_id','city_id'];

}
