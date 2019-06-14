<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {

    return [
        'type' => Media::TYPE_MEDIA_PHOTO,
        'media' => $faker->image(Media::$path, Media::$width, Media::$height,null, false),
        'status'=>1
    ];
});
