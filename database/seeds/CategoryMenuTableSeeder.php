<?php

use Illuminate\Database\Seeder;

class CategoryMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_menus = array(
            array('id' => '2', 'title' => 'main menu', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'main_menu', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '3', 'title' => 'Quick Links', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'footer_1', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '6', 'title' => 'My Account', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'footer_4', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '7', 'title' => 'BUY', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'footer_3', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '8', 'title' => 'category', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => 'category', 'position' => 'footer_6', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '9', 'title' => 'foreign', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'footer_7', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '10', 'title' => 'network', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'main_menu', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '11', 'title' => 'My Account', 'url' => 'members/myAccount', 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'header_1', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '12', 'title' => 'Buy', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'header_2', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '13', 'title' => 'Sell', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'header_3', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '14', 'title' => 'منو اصلی', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'main_menu', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '15', 'title' => 'لینک های سریع', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'footer_1', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '16', 'title' => 'حساب من', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'footer_4', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '17', 'title' => 'خرید', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'footer_3', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '18', 'title' => 'دسته بندی', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => 'category', 'position' => 'footer_6', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '19', 'title' => 'تجارت های بین المللی', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'footer_7', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '20', 'title' => 'شبکه', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'footer_8', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '21', 'title' => 'حساب کاربری', 'url' => 'members/myaccount', 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'header_1', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '22', 'title' => 'خرید', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'header_2', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '23', 'title' => 'فروش', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'header_3', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '24', 'title' => 'SELL', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'footer_2', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '25', 'title' => 'فروش', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'footer_2', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '26', 'title' => 'main menu offline', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'main_menu', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '27', 'title' => 'منوی اصلی افلاین', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'main_menu', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '28', 'title' => 'Our Network', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'en', 'type_menu' => NULL, 'position' => 'network', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23'),
            array('id' => '29', 'title' => 'شبکه ما', 'url' => NULL, 'meta_description' => NULL, 'meta_keyword' => NULL, 'meta_data' => NULL, 'status' => '1', 'locale' => 'fa', 'type_menu' => NULL, 'position' => 'network', 'created_at' => '2019-05-24 14:51:23', 'updated_at' => '2019-05-24 14:51:23')
        );

        foreach ($category_menus as $set) {
            $category_menu = \App\CategoryMenu::updateOrCreate($set);
            if ($category_menu->id == 27 || $category_menu->id != 26) continue;
            $category_menu->portals()->attach([5, 6]);

        }
    }
}
