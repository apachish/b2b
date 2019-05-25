<?php

namespace App;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    use UploadImage;
    protected $fillable =[  'id',
      'name',
      'name_fa',
      'image',
      'slug',
      'slug_fa',
      'description',
      'description_fa',
      'sort_order',
      'status',
      'meta_title',
      'meta_keywords',
      'meta_description',
      'feature',
        'parent_id'
    ];

    public function getCategoryTitle()
    {
        return app()->getLocale()=='fa'?$this->name_fa:$this->name;
    }
}
