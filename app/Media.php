<?php

namespace App;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use UploadImage;
    protected $fillable = ['type', 'media'];

    const TYPE_MEDIA_PHOTO = 'photo';
    const TYPE_MEDIA_VIDEO = 'video';
    const TYPE_MEDIA_PDF = 'pdf';

    public static $type_file = 'photos';
    public function __construct(array $attributes = [])
    {
        self::$section = 'medias';
        self::$path = public_path() . '/images/' . self::$section . '/'.self::$type_file.'/';
        parent::__construct($attributes);
    }

    public static function type_media($select = 'all')
    {
        $type_media = [
            self::TYPE_MEDIA_PHOTO => 'photo',
            self::TYPE_MEDIA_VIDEO => 'video',
            self::TYPE_MEDIA_PDF => 'pdf',

        ];
        if ($select == 'all') return $type_media;
        if ($select && array_key_exists($select, $type_media)) return $type_media[$select];
        if ($select == 'key') return array_keys($type_media);
        return [];
    }

    public function leads()
    {
        return $this->belongsToMany(Lead::class);
    }
    public function banners()
    {
        return $this->belongsToMany(Banner::class);
    }
}
