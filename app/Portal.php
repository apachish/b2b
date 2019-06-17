<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    protected $fillable = ['title','description','domain','locale','social','status','meta_data'];
}
