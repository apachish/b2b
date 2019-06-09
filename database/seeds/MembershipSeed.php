<?php

use App\Membership;
use Illuminate\Database\Seeder;

class MembershipSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberships = array(
            array('id' => '1','plan_name' => 'Gold','price' => '150','duration' => '8','product_upload' => '9','no_of_category' => '7','no_of_enquiry' => '10','locale' => 'fa','status' => '1','created_at' => '2019-06-09 00:00:00','updated_at' => '2019-06-09 00:00:00'),
            array('id' => '2','plan_name' => 'نقره ای ','price' => '100000','duration' => '3','product_upload' => '5','no_of_category' => '4','no_of_enquiry' => '5','locale' => 'fa','status' => '1','created_at' => '2019-06-09 00:00:00','updated_at' => '2019-06-09 00:00:00'),
            array('id' => '3','plan_name' => 'Bronze','price' => '5000','duration' => '3','product_upload' => '2','no_of_category' => '5','no_of_enquiry' => '4','locale' => 'fa','status' => '1','created_at' => '2019-06-09 00:00:00','updated_at' => '2019-06-09 00:00:00'),
            array('id' => '4','plan_name' => 'ازاد','price' => '0','duration' => '12','product_upload' => '15','no_of_category' => '11','no_of_enquiry' => '5','locale' => 'fa','status' => '1','created_at' => '2019-06-09 00:00:00','updated_at' => '2019-06-09 00:00:00')
        );

        foreach (array_chunk($memberships, 250) as $set) {
            Membership::insert($set);
        }
    }
}
