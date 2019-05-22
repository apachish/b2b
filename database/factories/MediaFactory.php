<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    return [
        'media_type' => Media::TYPE_MEDIA_PHOTO,
        'media' => $faker->image(Media::$path, Media::$width, Media::$height),
        'status'=>1
    ];
});
