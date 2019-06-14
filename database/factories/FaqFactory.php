<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CategoryFaq;
use App\Faq;
use Faker\Generator as Faker;
use Faker\Provider\fa_IR\Text;

$factory->define(Faq::class, function (Faker $faker) {
    $locale = \Illuminate\Support\Arr::random(['fa','en']);
    $faker->addProvider(new Text($faker));

    return [
        'parent_id'=> CategoryFaq::where('locale',$locale)->inRandomOrder()->first()->id,
        'question'=>$faker->sentence,
        'answer'=>$locale=='fa'?$faker->realText():$faker->text(),
        'yes'=>0,
        'no'=>0,
        'sort_order'=>Faq::count()+1,
        'status'=>1,
        'meta_data'=>$locale=='fa'?$faker->realText():$faker->text(),
        'locale'=>$locale
    ];
});
