<?php

namespace App;

use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use \Illuminate\Support\Collection;

class CategorySlug extends Model
{
    use Sluggable;
    protected $table = 'categories';
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
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
            'slug_fa' => [
                'source' => 'name_fa'
            ],
        ];
    }


}
