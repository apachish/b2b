<?php

use Illuminate\Database\Seeder;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = [
            ['id'=>1,'title'=>'Manufactures'],
            ['id'=>2,'title'=>'Exporters'],
            ['id'=>3,'title'=>'Suppliers'],
            ['id'=>4,'title'=>'Importers'],
            ['id'=>5,'title'=>'Service Providers'],
        ];
        foreach ($seller as $set) {
            \App\Seller::insert($set);
        }
    }
}
