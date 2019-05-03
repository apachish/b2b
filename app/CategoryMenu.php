<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMenu extends Model
{
    protected $fillable=['title','url','meta_description'
        ,'meta_keyword','meta_data','status','locale','type_menu','position'];

    public function portals(){
        return $this->belongsToMany(Portal::class);
    }
    public function menus()
    {
        return $this->hasMany(Menu::class,'parent_id','id');
    }
}
