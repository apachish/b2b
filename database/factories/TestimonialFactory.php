<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use App\Testimonial;
use Faker\Generator as Faker;
use Faker\Provider\fa_IR\Company;
use Faker\Provider\fa_IR\Person;
use Faker\Provider\fa_IR\Text;
use Illuminate\Support\Arr;

$factory->define(Testimonial::class, function (Faker $faker) {
    $faker->addProvider(new Person($faker));
    $faker->addProvider(new Company($faker));
    $faker->addProvider(new Text($faker));
    $language = Arr::random(['fa', 'en']);
    return [
        'city_id' => City::where('country_id', 108)->inRandomOrder()->first()->id,
        'poster_name' => $faker->name(),
        'company' => $faker->company,
        'email' => $faker->email,
        'description' => $language == 'fa' ? $faker->realText(500) : $faker->text(500),
        'is_footer' => false,
        'status' => 1,
        'locale' => $language,
    ];
});
