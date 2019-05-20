<?php

namespace App;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use UploadImage;
    protected $fillable = ['banner_position', ''];

    const BANNER_POSITION_RIGHT = 'Right';
    const BANNER_POSITION_LEFT = 'Left';
    const BANNER_POSITION_MIDDLE = 'Middle';
    const BANNER_POSITION_BOTTOM = 'Bottom';
    const BANNER_POSITION_HOME_SCROLLING = 'Home Scrolling';

    public static function type_position($select = 'all')
    {
        $type_view = [
            self::BANNER_POSITION_RIGHT => 'tag',
            self::BANNER_POSITION_LEFT => 'keywords',
            self::BANNER_POSITION_MIDDLE => 'keywords',
            self::BANNER_POSITION_BOTTOM => 'keywords',
            self::BANNER_POSITION_HOME_SCROLLING => 'keywords',
        ];
        if ($select == 'all') return $type_view;
        if ($select && array_key_exists($select, $type_view)) return $type_view[$select];
        if ($select == 'key') return array_keys($type_view);
        return [];
    }


    const BANNER_USER = 1;
    const BANNER_ADMIN = 2;
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
}
