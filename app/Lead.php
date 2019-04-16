<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public function categories(){
        return$this->belongsToMany(Category::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }
}
