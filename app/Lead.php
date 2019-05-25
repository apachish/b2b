<?php

namespace App;

use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use UploadImage;

    protected $fillable = ['user_id', 'name', 'ad_type', 'no_of_visits', 'product_friendly_url', 'description', 'detail_description', 'status',
        'new_status', 'approval_status', 'push_request', 'sort_order', 'publish_at', 'meta_data', 'city_id', 'locale', 'meta_keywords'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }

    public function medias()
    {
        return $this->belongsToMany(Media::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }


    public function pagePositions()
    {
        return $this->belongsToMany(PagePosition::class,'page_position_model','id_model');//withPivot(['created_at'])//change pivot to tag
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'product_friendly_url' => [
                'source' => 'name'
            ],
        ];
    }
}
