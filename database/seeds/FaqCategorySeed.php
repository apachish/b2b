<?php

use App\CategoryFaq;
use Illuminate\Database\Seeder;

class FaqCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tbl_faqcategories = array(
            array('id' => '1','locale'=>'en', 'name' => 'Buyers', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 1, 'created_at' => '2015-02-16 05:50:07', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '2','locale'=>'en', 'name' => 'Sellers', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 2, 'created_at' => '2015-02-16 05:50:19', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '3','locale'=>'en', 'name' => 'Articles', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 3, 'created_at' => '2015-02-16 05:50:33', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '4','locale'=>'en', 'name' => 'Companies', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 4, 'created_at' => '2015-02-16 05:51:08', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '5','locale'=>'en', 'name' => 'Membership', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 5, 'created_at' => '2015-02-16 05:51:21', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '6','locale'=>'en', 'name' => 'Buy/SellLeads', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 6, 'created_at' => '2015-02-16 05:51:43', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '7','locale'=>'en', 'name' => 'Advertisement', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 7, 'created_at' => '2015-02-16 05:52:00', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '8','locale'=>'fa', 'name' => 'خریداران', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 1, 'created_at' => '2015-02-16 05:50:07', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '9','locale'=>'fa', 'name' => 'فروشندگان', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 2, 'created_at' => '2015-02-16 05:50:19', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '10','locale'=>'fa', 'name' => 'مقالات', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 3, 'created_at' => '2015-02-16 05:50:33', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '11','locale'=>'fa', 'name' => 'شرکت ها', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 4, 'created_at' => '2015-02-16 05:51:08', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '12','locale'=>'fa', 'name' => 'عضویت', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 5, 'created_at' => '2015-02-16 05:51:21', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '13','locale'=>'fa', 'name' => 'آگهی خرید/فروش', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 6, 'created_at' => '2015-02-16 05:51:43', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL),
            array('id' => '14','locale'=>'fa', 'name' => 'تبلیغات', 'description' => NULL, 'parent_id' => NULL, 'sort_order' => 7, 'created_at' => '2015-02-16 05:52:00', 'updated_at' => '2018-06-06 00:00:00', 'status' => '1', 'meta_title' => NULL, 'meta_keywords' => NULL, 'meta_description' => NULL)

        );
        foreach (array_chunk($tbl_faqcategories, 250) as $set) {
            CategoryFaq::insert($set);
        }
    }
}
