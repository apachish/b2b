<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use App\Lead;
use Faker\Generator as Faker;

$factory->define(Lead::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(2),
        'ad_type'=>\Illuminate\Support\Arr::random(['sell','buy']),
        'description'=>$faker->sentence(),
        'detail_description'=>$faker->realText(),
        'status'=>1,
        'approval_status'=>2,
        'sort_order'=>$faker->numberBetween(0,200),
        'publish_at'=>now(),
        'meta_data'=>'{"statusCode":"OK","statusMessage":"","ipAddress":"185.109.249.207","countryCode":"IR","countryName":"Iran, Islamic Republic of","regionName":"Tehran","cityName":"Tehran","zipCode":"11369","latitude":"35.6944","longitude":"51.4215","timeZone":"+04:30","countryCodeLocal":101,"statesCodeLocal":7,"cityCodeLocal":8}',
        'city_id'=>City::where('country_id',108)->inRandomOrder()->first()->id,
        'locale'=>\Illuminate\Support\Arr::random(['fa','en']),
        'meta_keywords'=>json_encode(implode(' ',$faker->sentences(3)))
    ];
});
