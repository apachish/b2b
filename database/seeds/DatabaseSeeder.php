<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        //$this->call(CountryTableSeeder::class);
        $this->call(PortalTableSeeder::class);
        factory(\App\User::class,1)->create();
        $this->call(CategoryMenuTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(SellerTableSeeder::class);
    }
}
