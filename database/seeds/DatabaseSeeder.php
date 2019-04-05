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
        // $this->call(UsersTableSeeder::class);
        //$this->call(CountryTableSeeder::class);
        $this->call(CategoryMenuTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(PortalTableSeeder::class);
        $this->call(SellerTableSeeder::class);
    }
}
