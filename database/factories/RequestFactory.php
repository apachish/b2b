<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker,$attribute) {
    return [
        'member_id'=>$attribute['member_id'],
        'name'=>$faker->name,
        'company_name'=>$faker->company,
        'email'=>$faker->email,
        'mobile'=>$faker->phoneNumber,
        'comments'=>$faker->realText(),
        'status'=>1
    ];
});
