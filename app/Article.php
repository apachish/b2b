<?php

namespace App;

use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use UploadImage;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $fillable = ['title', 'description', 'body', 'image', 'sort_order', 'status', 'locale', 'feature', 'user_id','slug'];

    public function __construct(array $attributes = [])
    {
        self::$section = 'articles';
        self::$path = public_path() . '/images/' . self::$section . '/';
        parent::__construct($attributes);
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
