<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Banner;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Banner::class, function (Faker $faker) {
    Banner::$section = 'banner';
    return [
        'banner_position' => Arr::random(Banner::type_position('key')),
        'time_duration' => $faker->numberBetween(1, 12),
        'image' => $faker->image(Banner::$path, Banner::$width, Banner::$height, null, false),
        'banner_url' => $faker->url,
        'status' => 1,
        'banner_type' => Arr::random(Banner::$banner_type),
        'start_date' => now(),
        'end_date' => now()->addDays(60),
        'sort_order' => $faker->randomNumber(),
        'locale' => Arr::random(['fa', 'en'])
    ];
});
