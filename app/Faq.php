<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['parent_id','question','answer','yes','no','sort_order','status','meta_data','locale'];

    public function categoryFaq()
    {
        return $this->belongsTo(CategoryFaq::class,'parent_id');
    }
}
