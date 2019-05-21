<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagePosition extends Model
{
    protected $fillable = ['name'];
    public $timestamps =false;
    const TYPE_MODEL_LEAD = 'lead';
    const TYPE_MODEL_BANNER = 'banner';

    public static function type_model($select = 'all')
    {
        $type_model = [
            self::TYPE_MODEL_LEAD => 'lead',
            self::TYPE_MODEL_BANNER => 'banner',
        ];
        if ($select == 'all') return $type_model;
        if ($select && array_key_exists($select, $type_model)) return $type_model[$select];
        if ($select == 'key') return array_keys($type_model);
        return [];
    }
}
