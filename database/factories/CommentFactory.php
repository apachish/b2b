<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\fa_IR\Person;
use Faker\Provider\fa_IR\Text;

$factory->define(Comment::class, function (Faker $faker) {
    $faker->addProvider(new Text($faker));
    $faker->addProvider(new Person($faker));
    return [
        'user_id'=> User::where('status', 1)->inRandomOrder()->first()->id,
        'name'=> $faker->name(),
        'email'=>$faker->email,
        'comment'=>$faker->realText(),
        'status'=>1
    ];
});
