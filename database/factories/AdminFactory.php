<?php


use App\User;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    return [
        'first_name' => 'شهریار',
        'last_name' => 'پهلوان صادق',
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'status'=>1,
        'role'=>'admin',
        'portal_id'=>5,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});







            $table->string('ip_address')->nullable();
            $table->boolean('featured_company')->default(false);
            $table->text('token_key')->nullable();
            $table->text('meta_data')->nullable();
 */
