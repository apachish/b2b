<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    protected $fillable = ['city_id',
        'title',
        'poster_name',
        'company',
        'email',
        'description',
        'is_footer',
        'status',
        'locale',
        'slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['poster_name', 'title'],
                'separator' => '_'
            ],
        ];
    }
}
