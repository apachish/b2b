<?php

namespace App;

use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use UploadImage;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $fillable=['name','friendly_url','short_description','description','image',
    'status','locale','last_modified_by'
    ];
    public function __construct(array $attributes = [])
    {
        self::$section = 'articles';
        self::$path = public_path() . '/images/' . self::$section . '/';
        parent::__construct($attributes);
    }
    public function sluggable()
    {
        return [
            'friendly_url' => [
                'source' => 'name'
            ],
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class,'last_modified_by');
    }
}
