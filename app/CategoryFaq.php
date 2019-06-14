<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFaq extends Model
{
    protected $fillable = ['name', 'description',
        'parent_id', 'sort_order', 'status', 'meta_title', 'meta_keywords', 'meta_description','locale'];
    protected $table = 'category_faq';

    public function faqs()
    {
        return $this->hasMany(Faq::class,'parent_id');
    }
}
