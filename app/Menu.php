<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['type','parent_id','base_url','page_url','title'
        ,'meta_description','meta_keyword','meta_data','order_menu',
    'status','locale','class','category','permission'];


    public function categoryMenu()
    {
        return $this->hasOne(CategoryMenu::class,'id','parent_id');
    }
}
