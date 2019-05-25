<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\fa_IR\Text;
use Illuminate\Support\Arr;

$factory->define(Article::class, function (Faker $faker) {
    $faker->addProvider(new Text($faker));

    return [
        'title'=>$faker->realText(30),
        'description'=>$faker->realText(3000),
        'body'=>$faker->realText(10000),
        'image' => $faker->image(Article::$path, Article::$width, Article::$height, null, false),
        'sort_order' => $faker->numberBetween(0,100),
        'locale' => Arr::random(['fa', 'en']),
        'status'=>1,
        'feature'=>rand(0,1),
        'user_id'=> User::inRandomOrder()->first()->id
    ];
});
