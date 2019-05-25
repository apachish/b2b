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
        $category = [
            ['id' => 2, 'title' => 'main menu', 'status' => true, 'locale' => 'en', 'position' => 'main_menu'],
            ['id' => 3, 'title' => 'Quick Links', 'status' => true, 'locale' => 'en', 'position' => 'footer_1'],
            ['id' => 6, 'title' => 'My Account', 'status' => true, 'locale' => 'en', 'position' => 'footer_4'],
            ['id' => 7, 'title' => 'BUY', 'status' => true, 'locale' => 'en', 'position' => 'footer_3'],
            ['id' => 8, 'title' => 'category', 'status' => true, 'locale' => 'en', 'position' =>'footer_6'],
            ['id' => 9, 'title' => 'foreign', 'status' => true, 'locale' => 'en', 'position' => 'footer_7'],
            ['id' => 10, 'title' => 'network', 'status' => true, 'locale' => 'en'],
            ['id' => 11, 'title' => 'My Account', 'url' => 'members/myAccount', 'status' => true, 'locale' => 'en', 'position' => 'header_1'],
            ['id' => 12, 'title' => 'Buy', 'status' => true, 'locale' => 'en', 'position' => 'header_2'],
            ['id' => 13, 'title' => 'Sell', 'status' => true, 'locale' => 'en', 'position' => 'header_3'],
            ['id' => 14, 'title' => 'منو اصلی', 'status' => true, 'locale' => 'fa', 'position' => 'main_menu'],
            ['id' => 15, 'title' => 'لینک های سریع', 'status' => true, 'locale' => 'fa', 'position' => 'footer_1'],
            ['id' => 16, 'title' => 'حساب من', 'status' => true, 'locale' => 'fa', 'position' => 'footer_4'],
            ['id' => 17, 'title' => 'خرید', 'status' => true, 'locale' => 'fa', 'position' => 'footer_3'],
            ['id' => 18, 'title' => 'دسته بندی', 'status' => true, 'locale' => 'fa','position' => 'footer_6'],
            ['id' => 19, 'title' => 'تجارت های بین المللی', 'status' => true, 'locale' => 'fa', 'position' => 'footer_7'],
            ['id' => 20, 'title' => 'شبکه', 'status' => true, 'locale' => 'fa', 'position' => 'footer_8'],
            ['id' => 21, 'title' => 'حساب کاربری', 'url' => 'members/myaccount', 'status' => true, 'locale' => 'fa', 'position' => 'header_1'],
            ['id' => 22, 'title' => 'خرید', 'status' => true, 'locale' => 'fa', 'position' => 'header_2'],
            ['id' => 23, 'title' => 'فروش', 'status' => true, 'locale' => 'fa', 'position' => 'header_3'],
            ['id' => 24, 'title' => 'SELL', 'status' => true, 'locale' => 'en', 'position' => 'footer_2'],
            ['id' => 25, 'title' => 'فروش', 'status' => true, 'locale' => 'fa', 'position' => 'footer_2'],
            ['id' => 26, 'title' => 'main menu offline', 'status' => true, 'locale' => 'en', 'position' => 'main_menu'],
            ['id' => 27, 'title' => 'منوی اصلی افلاین', 'status' => true, 'locale' => 'fa', 'position' => 'main_menu'],
            ['id' => 28, 'title' => 'Our Network', 'status' => true, 'locale' => 'en', 'position' => 'network'],
            ['id' => 29, 'title' => 'شبکه ما', 'status' => true, 'locale' => 'fa', 'position' => 'network']

        ];
        foreach ($category as $set) {
            $category_menu = \App\CategoryMenu::updateOrCreate($set);
            if($set['id'] != 27 || $set['id'] != 26)
            $category_menu->portals()->attach([5,6]);

        }
    }
}
