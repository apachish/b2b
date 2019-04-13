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
      'image_thumb',
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
}
