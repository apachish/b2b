<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use App\State;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\fa_IR\Address;
use Faker\Provider\fa_IR\Company;
use Faker\Provider\fa_IR\Person;
use Faker\Provider\fa_IR\PhoneNumber;
use Faker\Provider\fa_IR\Text;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    User::$section = 'avatar';
    $faker->addProvider(new Text($faker));
    $faker->addProvider(new Person($faker));
    $faker->addProvider(new Company($faker));
    $faker->addProvider(new Address($faker));
    $faker->addProvider(new PhoneNumber($faker));
    $category_id = \App\Category::whereNull('parent_id')->inRandomOrder()->first()->id;
    $country_id = 108;
    $state_id = State::where('country_id',108)->inRandomOrder()->first()->id;
    $city_id = City::where('country_id',108)->inRandomOrder()->first()->id;
    return [
        'first_name' =>$faker->name(),
        'last_name' =>$faker->lastName,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'status'=>1,
        'role'=>!User::whereRole('admin')->count()?'admin':'customer',
        'portal_id'=>5,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'image_path' => $faker->image(public_path() . '/images/avatar/', User::$width, User::$height, null, false),

        'last_modified_by'=>1,
        'bio'=>$faker->realText(),
        'locale'=>'fa',
        'company_name'=>$faker->company,
        'company_logo'=>$faker->image(public_path() . '/images/logo/', User::$width, User::$height, null, false),
        'category_id'=>$category_id,
        'company_details'=>$faker->realText(),
        'address'=>$faker->address,
        'country_id'=>$country_id,
        'state_id'=>$state_id,
        'city_id'=>$city_id,
        'pincode'=>$faker->buildingNumber,
        'phone_number'=>$faker->phoneNumber,
        'mobile'=>$faker->phoneNumber,
        'website'=>$faker->url,
        'current_login'=> now(),
        'last_login_date'=> now(),
        'ip_address'=>$faker->ipv4,
        'featured_company'=>\Illuminate\Support\Arr::random([0,1]),
    ];
});
