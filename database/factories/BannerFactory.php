<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Banner;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Banner::class, function (Faker $faker) {
    $position = Arr::random(Banner::type_position('key'));
    return [
        'banner_position' =>$position,
        'time_duration' => $faker->numberBetween(1, 12),
        'image' => $faker->image(Banner::$path, Banner::type_position($position,'width'), Banner::type_position($position,'height'), null, false),
        'title'=>$faker->sentence,
        'banner_url' => $faker->url,
        'status' => 1,
        'banner_type' => Arr::random(Banner::$banner_type),
        'start_date' => now(),
        'end_date' => now()->addDays(60),
        'sort_order' => $faker->numberBetween(0,200),
        'locale' => Arr::random(['fa', 'en'])
    ];
});
