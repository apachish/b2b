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
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(City1TableSeeder::class);
        $this->call(City2TableSeeder::class);
        $this->call(City3TableSeeder::class);
        $this->call(City4TableSeeder::class);
        $this->call(City5TableSeeder::class);
        $this->call(PortalTableSeeder::class);
        $this->call(CategoryMenuTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(SellerTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PagePositionSeed::class);
        $this->call(MembershipSeed::class);
        $this->call(TranslateSeed::class);
        $this->call(FaqCategorySeed::class);
        $this->call(UserSeed::class);
        $this->call(PageSeed::class);
    }
}
