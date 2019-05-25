<?php

namespace App;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use UploadImage;
    protected $fillable = ['banner_position', 'time_duration', 'image',
        'banner_url', 'banner_page', 'status', 'banner_type',
        'start_date', 'end_date', 'sort_order', 'clicks', 'locale'
    ];

    const BANNER_POSITION_RIGHT = 'right';
    const BANNER_POSITION_LEFT = 'left';
    const BANNER_POSITION_MIDDLE = 'middle';
    const BANNER_POSITION_BOTTOM = 'bottom';
    const BANNER_POSITION_HOME_SCROLLING = 'home_scrolling';

    const BANNER_USER = 'user';
    const BANNER_ADMIN = 'admin';
    public static $banner_type = array(
        self::BANNER_USER => 'user',
        self::BANNER_ADMIN => 'admin',
    );
    const STATUS_INACTIVE = -1;
    const STATUS_ACTIVE = 1;
    public static $status_type = array(
        self::STATUS_INACTIVE => 'Inactive',
        self::STATUS_ACTIVE => 'Active',
    );

    public function __construct(array $attributes = [])
    {
        self::$section = 'banners';
        self::$path = public_path() . '/images/' . self::$section . '/';
        parent::__construct($attributes);
    }


    public static function type_position($select = 'all',$key=null)
    {
        $type_view = [
            self::BANNER_POSITION_RIGHT => ['position' => 'Right', 'width' => '240', 'height' => '240'],
            self::BANNER_POSITION_LEFT => ['position' => 'Left', 'width' => '200', 'height' => '240'],
            self::BANNER_POSITION_MIDDLE => ['position' => 'Middle', 'width' => '468', 'height' => '60'],
            self::BANNER_POSITION_BOTTOM => ['position' => 'Bottom', 'width' => '470', 'height' => '95'],
            self::BANNER_POSITION_HOME_SCROLLING => ['position' => 'Home Scrolling', 'width' => '480', 'height' => '250'],
        ];
        if ($select == 'all') return $type_view;
        if ($select && $key && array_key_exists($select, $type_view)) {
            if (array_key_exists($key, $type_view[$select])) {
                return $type_view[$select][$key];
            }
        }
        if ($select && array_key_exists($select, $type_view)) return $type_view[$select];
        if ($select == 'key') return array_keys($type_view);
        return [];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }

    public function pagePositions()
    {
        return $this->belongsToMany(PagePosition::class, 'page_position_model', 'id_model');//withPivot(['created_at'])//change pivot to tag
    }
}
