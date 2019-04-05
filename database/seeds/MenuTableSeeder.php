<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menu = [
            [
                "id" => 1,
                "type" => "main_page",
                
                "base_url" => "home",
                "page_url" => null,
                "title" => "خانه",
                "meta_data" => "[]",
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 2,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 1, "page" => "about - us"]),
                "title" => "About Us",
                "meta_data" => json_encode(["value" => 1, "title" => "About Us", "url" => "home\/pages\/about - us\/1"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 3,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 34, "page" => "\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627"]),
                "title" => "درباره ما",
                "meta_data" => json_encode(["value" => 34, "title" => "\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627", "url" => "home\/pages\/\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627\/34"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 4,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 4, "page" => "contact - us"]),
                "title" => "Contact Us",
                "meta_data" => json_encode(["value" => 4, "title" => "Contact Us", "url" => "home\/pages\/contact - us\/4"]),
                "order_menu" => 7,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 5,
                "type" => "contact_us",
                
                "base_url" => "contact_us",
                "page_url" => json_encode(["id" => 33, "page" => "\u0627\u0631\u062a\u0628\u0627\u0637 \u0628\u0627 \u0645\u0627"]),
                "title" => "ارتباط با ما",
                "meta_data" => "[]",
                "order_menu" => 8,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 6,
                "type" => "main_page",
                
                "base_url" => "home",
                "page_url" => null,
                "title" => "Home",
                "meta_data" => "[]",
                "order_menu" => 1,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => ""
            ],
            [
                "id" => 7,
                "type" => "main_page",
                
                "base_url" => "home",
                "page_url" => null,
                "title" => "Home",
                "meta_data" => "[]",
                "order_menu" => 1,
                "status" => true,
                "locale" => "en",
                "category" => 3,
                "class" => null
            ],
            [
                "id" => 8,
                "type" => "main_page",
                
                "base_url" => "home",
                "page_url" => null,
                "title" => "خانه",
                "meta_data" => "[]",
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 9,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 1, "page" => "about - us"]),
                "title" => "About Us",
                "meta_data" => json_encode(["value" => 1, "title" => "About Us", "url" => "home\/pages\/about - us\/1"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "en",
                "category" => 3,
                "class" => null
            ],
            [
                "id" => 10,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 34, "page" => "\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627"]),
                "title" => "درباره ما	",
                "meta_data" => json_encode(["value" => 34, "title" => "\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627", "url" => "home\/pages\/\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627\/34"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 11,
                "type" => "product",
                
                "base_url" => "home/products",
                "page_url" => null,
                "title" => "Products",
                "meta_data" => "[]",
                "order_menu" => 0,
                "status" => true,
                "locale" => "en",
                "category" => 3,
                "class" => null
            ],
            [
                "id" => 12,
                "type" => "product",
                
                "base_url" => "home/products",
                "page_url" => null,
                "title" => "محصولات",
                "meta_data" => "[]",
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 13,
                "type" => "category",
                
                "base_url" => "home/companies",
                "page_url" => "[]",
                "title" => "companies",
                "meta_data" => json_encode(["type_category" => "companies", "value" => "", "title" => "", "url" => "home\/companies"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 14,
                "type" => "category",
                
                "base_url" => "home/buyselllead",
                "page_url" => "[]",
                "title" => "products",
                "meta_data" => json_encode(["type_category" => "buyselllead", "value" => "", "title" => "", "url" => "home\/buyselllead"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 15,
                "type" => "category",
                
                "base_url" => "home/buylead",
                "page_url" => "[]",
                "title" => "Buy Leads",
                "meta_data" => json_encode(["type_category" => "buylead", "value" => "", "title" => "", "url" => "home\/buylead"]),
                "order_menu" => 5,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 16,
                "type" => "category",
                
                "base_url" => "home/selllead",
                "page_url" => "[]",
                "title" => "Sell Leads",
                "meta_data" => json_encode(["type_category" => "selllead", "value" => "", "title" => "", "url" => "home\/selllead"]),
                "order_menu" => 6,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 17,
                "type" => "article",
                
                "base_url" => "home/articles",
                "page_url" => null,
                "title" => "Articles",
                "meta_data" => "[]",
                "order_menu" => 6,
                "status" => true,
                "locale" => "en",
                "category" => 2,
                "class" => null
            ],
            [
                "id" => 18,
                "type" => "category",
                
                "base_url" => "home/companies",
                "page_url" => "[]",
                "title" => "test",
                "meta_data" => json_encode(["type_category" => "companies", "value" => "", "title" => "", "url" => "home\/companies"]),
                "order_menu" => 0,
                "status" => true,
                "locale" => "en",
                "category" => 3,
                "class" => null
            ],
            [
                "id" => 19,
                "type" => "category",
                
                "base_url" => "home/companies",
                "page_url" => "[]",
                "title" => "شرکت ها",
                "meta_data" => json_encode(["type_category" => "companies", "value" => "", "title" => "", "url" => "home\/companies"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 20,
                "type" => "category",
                
                "base_url" => "home/buyselllead",
                "page_url" => "[]",
                "title" => "محصولات",
                "meta_data" => json_encode(["type_category" => "buyselllead", "value" => "", "title" => "", "url" => "home\/buyselllead"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 21,
                "type" => "category",
                
                "base_url" => "home/buylead",
                "page_url" => "[]",
                "title" => "آگهی خرید",
                "meta_data" => json_encode(["type_category" => "buylead", "value" => "", "title" => "", "url" => "home\/buylead"]),
                "order_menu" => 5,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 22,
                "type" => "category",
                
                "base_url" => "home/selllead",
                "page_url" => "[]",
                "title" => "اگهی فروش",
                "meta_data" => json_encode(["type_category" => "selllead", "value" => "", "title" => "", "url" => "home\/selllead"]),
                "order_menu" => 6,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 23,
                "type" => "article",
                
                "base_url" => "home/articles",
                "page_url" => null,
                "title" => "مقالات",
                "meta_data" => "[]",
                "order_menu" => 7,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 24,
                "type" => "sitemap",
                
                "base_url" => "sitemap",
                "page_url" => null,
                "title" => "نقشه سایت",
                "meta_data" => "[]",
                "order_menu" => 9,
                "status" => true,
                "locale" => "fa",
                "category" => 14,
                "class" => ""
            ],
            [
                "id" => 25,
                "type" => "member",
                
                "base_url" => "members/post_lead",
                "page_url" => "[]",
                "title" => "ارسال آگهی جدید",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "post_lead"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 21,
                "class" => ""
            ],
            [
                "id" => 26,
                "type" => "member",
                
                "base_url" => "members/manage_leads",
                "page_url" => "[]",
                "title" => "مدیریت آگهی ها",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "manage_leads"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 21,
                "class" => ""
            ],
            [
                "id" => 27,
                "type" => "member",
                
                "base_url" => "members/manage_enquiry",
                "page_url" => "[]",
                "title" => "مدیریت درخواست ها",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "manage_enquiry"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 21,
                "class" => ""
            ],
            [
                "id" => 28,
                "type" => "member",
                
                "base_url" => "members/edit_account",
                "page_url" => "[]",
                "title" => "به روز رسانی اطلاعات پروفایل",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "edit_account"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 21,
                "class" => ""
            ],
            [
                "id" => 29,
                "type" => "member",
                
                "base_url" => "members/logout",
                "page_url" => "[]",
                "title" => "خروج",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "logout"]),
                "order_menu" => 5,
                "status" => true,
                "locale" => "fa",
                "category" => 21,
                "class" => ""
            ],
            [
                "id" => 30,
                "type" => "member",
                
                "base_url" => "members/post_lead/type_ad",
                "page_url" => json_encode(["type_ad" => "buy"]),
                "title" => "خرید",
                "meta_data" => json_encode(["type_lead" => "buy", "member_link_item" => "post_lead"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 17,
                "class" => "group1"
            ],
            [
                "id" => 31,
                "type" => "member",
                
                "base_url" => "members/newleads/type_ad",
                "page_url" => json_encode(["type_ad" => "buy"]),
                "title" => "محصولات تازه اضافه شده",
                "meta_data" => json_encode(["type_lead" => "buy", "member_link_item" => "newleads"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 17,
                "class" => ""
            ],
            [
                "id" => 32,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 36, "page" => "36\/\u0646\u062d\u0648\u0647 \u062e\u0631\u06cc\u062f"]),
                "title" => "نحوه خرید",
                "meta_data" => json_encode(["value" => 36, "title" => "\u0646\u062d\u0648\u0647 \u062e\u0631\u06cc\u062f", "url" => "home\/pages\/36\/\u0646\u062d\u0648\u0647 \u062e\u0631\u06cc\u062f\/36"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 17,
                "class" => ""
            ],
            [
                "id" => 33,
                "type" => "category",
                
                "base_url" => "home/buylead",
                "page_url" => "[]",
                "title" => "بازاریابی خرید",
                "meta_data" => json_encode(["type_category" => "buylead", "value" => "", "title" => "", "url" => "home\/buylead"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 17,
                "class" => ""
            ],
            [
                "id" => 34,
                "type" => "member",
                
                "base_url" => "members/post_lead/type_ad",
                "page_url" => json_encode(["type_ad" => "sell"]),
                "title" => "فروش",
                "meta_data" => json_encode(["type_lead" => "sell", "member_link_item" => "post_lead"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 25,
                "class" => "group1"
            ],
            [
                "id" => 35,
                "type" => "member",
                
                "base_url" => "members/newleads/type_ad",
                "page_url" => json_encode(["type_ad" => "sell"]),
                "title" => "محصولات تازه اضافه شده",
                "meta_data" => json_encode(["type_lead" => "sell", "member_link_item" => "newleads"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 25,
                "class" => ""
            ],
            [
                "id" => 36,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 37, "page" => "36\/\u0646\u062d\u0648\u0647 \u0641\u0631\u0648\u0634"]),
                "title" => "نحوه فروش",
                "meta_data" => json_encode(["value" => 37, "title" => "\u0646\u062d\u0648\u0647 \u0641\u0631\u0648\u0634", "url" => "home\/pages\/36\/\u0646\u062d\u0648\u0647 \u0641\u0631\u0648\u0634\/37"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 25,
                "class" => ""
            ],
            [
                "id" => 37,
                "type" => "category",
                
                "base_url" => "home/buylead",
                "page_url" => "[]",
                "title" => "بازایابی فروش",
                "meta_data" => json_encode(["type_category" => "buylead", "value" => "", "title" => "", "url" => "home\/buylead"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 25,
                "class" => ""
            ],
            [
                "id" => 38,
                "type" => "article",
                
                "base_url" => "home/articles",
                "page_url" => null,
                "title" => "مقالات",
                "meta_data" => "[]",
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 39,
                "type" => "testimonials",
                
                "base_url" => "testimonials",
                "page_url" => null,
                "title" => "نظرات مشتریان",
                "meta_data" => "[]",
                "order_menu" => 5,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 40,
                "type" => "help",
                
                "base_url" => "help",
                "page_url" => null,
                "title" => "پشتیبانی",
                "meta_data" => "[]",
                "order_menu" => 6,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 41,
                "type" => "newsletter",
                
                "base_url" => "newsLetter",
                "page_url" => null,
                "title" => "خبرنامه",
                "meta_data" => "[]",
                "order_menu" => 7,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => "group1"
            ],
            [
                "id" => 42,
                "type" => "contact_us",
                
                "base_url" => "contact_us",
                "page_url" => null,
                "title" => "تماس با ما",
                "meta_data" => "[]",
                "order_menu" => 8,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 43,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 39, "page" => "39\/\u062d\u0631\u06cc\u0645 \u062e\u0635\u0648\u0635\u06cc"]),
                "title" => "سیاست حفظ حریم خصوصی",
                "meta_data" => json_encode(["value" => 39, "title" => "\u062d\u0631\u06cc\u0645 \u062e\u0635\u0648\u0635\u06cc", "url" => "home\/pages\/39\/\u062d\u0631\u06cc\u0645 \u062e\u0635\u0648\u0635\u06cc\/39"]),
                "order_menu" => 9,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 44,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 41, "page" => "41\/\u0633\u0644\u0628 \u0645\u0633\u0626\u0648\u0644\u06cc\u062a \u062d\u0642\u0648\u0642\u06cc"]),
                "title" => "سلب مسئولیت حقوقی",
                "meta_data" => json_encode(["value" => 41, "title" => "\u0633\u0644\u0628 \u0645\u0633\u0626\u0648\u0644\u06cc\u062a \u062d\u0642\u0648\u0642\u06cc", "url" => "home\/pages\/41\/\u0633\u0644\u0628 \u0645\u0633\u0626\u0648\u0644\u06cc\u062a \u062d\u0642\u0648\u0642\u06cc\/41"]),
                "order_menu" => 11,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 45,
                "type" => "sitemap",
                
                "base_url" => "sitemap",
                "page_url" => null,
                "title" => "نقشه سایت",
                "meta_data" => "[]",
                "order_menu" => 12,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ],
            [
                "id" => 46,
                "type" => "member",
                
                "base_url" => "members/myaccount",
                "page_url" => "[]",
                "title" => "پروفایل",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "myaccount"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 16,
                "class" => ""
            ],
            [
                "id" => 47,
                "type" => "member",
                
                "base_url" => "members/login",
                "page_url" => "[]",
                "title" => "ورود به سایت",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "login"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 16,
                "class" => "group1"
            ],
            [
                "id" => 48,
                "type" => "member",
                
                "base_url" => "members/register",
                "page_url" => "[]",
                "title" => "ثبت نام در سایت",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "register"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 16,
                "class" => "group1"
            ],
            [
                "id" => 49,
                "type" => "member",
                
                "base_url" => "members/post_lead/type_ad",
                "page_url" => json_encode(["type_ad" => "sell"]),
                "title" => "فروش",
                "meta_data" => json_encode(["type_lead" => "sell", "member_link_item" => "post_lead"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 23,
                "class" => "group1"
            ],
            [
                "id" => 50,
                "type" => "member",
                
                "base_url" => "members/newleads/type_ad",
                "page_url" => json_encode(["type_ad" => "sell"]),
                "title" => "محصولات تازه اضافه شده",
                "meta_data" => json_encode(["type_lead" => "sell", "member_link_item" => "newleads"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 23,
                "class" => ""
            ],
            [
                "id" => 51,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 37, "page" => "36\/\u0646\u062d\u0648\u0647 \u0641\u0631\u0648\u0634"]),
                "title" => "نحوه فروش",
                "meta_data" => json_encode(["value" => 37, "title" => "\u0646\u062d\u0648\u0647 \u0641\u0631\u0648\u0634", "url" => "home\/pages\/36\/\u0646\u062d\u0648\u0647 \u0641\u0631\u0648\u0634\/37"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 23,
                "class" => ""
            ],
            [
                "id" => 52,
                "type" => "category",
                
                "base_url" => "home/buylead",
                "page_url" => "[]",
                "title" => "بازایابی فروش",
                "meta_data" => json_encode(["type_category" => "buylead", "value" => "", "title" => "", "url" => "home\/buylead"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 23,
                "class" => ""
            ],
            [
                "id" => 53,
                "type" => "member",
                
                "base_url" => "members/post_lead/type_ad",
                "page_url" => json_encode(["type_ad" => "buy"]),
                "title" => "خرید",
                "meta_data" => json_encode(["type_lead" => "buy", "member_link_item" => "post_lead"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 22,
                "class" => "group1"
            ],
            [
                "id" => 54,
                "type" => "member",
                
                "base_url" => "members/newleads/type_ad",
                "page_url" => json_encode(["type_ad" => "buy"]),
                "title" => "محصولات تازه اضافه شده",
                "meta_data" => json_encode(["type_lead" => "buy", "member_link_item" => "newleads"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 22,
                "class" => ""
            ],
            [
                "id" => 55,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 36, "page" => "36\/\u0646\u062d\u0648\u0647 \u062e\u0631\u06cc\u062f"]),
                "title" => "نحوه خرید",
                "meta_data" => json_encode(["value" => 36, "title" => "\u0646\u062d\u0648\u0647 \u062e\u0631\u06cc\u062f", "url" => "home\/pages\/36\/\u0646\u062d\u0648\u0647 \u062e\u0631\u06cc\u062f\/36"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 22,
                "class" => ""
            ],
            [
                "id" => 56,
                "type" => "category",
                
                "base_url" => "home/buylead",
                "page_url" => "[]",
                "title" => "بازاریابی خرید",
                "meta_data" => json_encode(["type_category" => "buylead", "value" => "", "title" => "", "url" => "home\/buylead"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 22,
                "class" => ""
            ],
            [
                "id" => 57,
                "type" => "member",
                
                "base_url" => "members/logout",
                "page_url" => "[]",
                "title" => "خروج",
                "meta_data" => json_encode(["type_lead" => "", "member_link_item" => "logout"]),
                "order_menu" => 5,
                "status" => true,
                "locale" => "fa",
                "category" => 16,
                "class" => ""
            ],
            [
                "id" => 58,
                "type" => "category",
                
                "base_url" => "home/category",
                "page_url" => "[]",
                "title" => " بر اساس حروف الفبا",
                "meta_data" => json_encode(["value" => "", "title" => "", "url" => "home\/category"]),
                "order_menu" => 23,
                "status" => true,
                "locale" => "fa",
                "category" => 18,
                "class" => "end_menu allphabet"
            ],
            [
                "id" => 59,
                "type" => "company",
                
                "base_url" => "companies",
                "page_url" => json_encode(["type" => "Manufactures"]),
                "title" => "تولید کننده",
                "meta_data" => json_encode(["sellerType" => "Manufactures"]),
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 19,
                "class" => ""
            ],
            [
                "id" => 60,
                "type" => "company",
                
                "base_url" => "companies",
                "page_url" => json_encode(["type" => "Exporters"]),
                "title" => "صادرکنندگان",
                "meta_data" => json_encode(["sellerType" => "Exporters"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 19,
                "class" => ""
            ],
            [
                "id" => 61,
                "type" => "company",
                
                "base_url" => "companies",
                "page_url" => json_encode(["type" => "Suppliers"]),
                "title" => "تامین کنندگان",
                "meta_data" => json_encode(["sellerType" => "Suppliers"]),
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 19,
                "class" => ""
            ],
            [
                "id" => 62,
                "type" => "company",
                
                "base_url" => "companies",
                "page_url" => json_encode(["type" => "Importers"]),
                "title" => "واردکنندگان",
                "meta_data" => json_encode(["sellerType" => "Importers"]),
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 19,
                "class" => ""
            ],
            [
                "id" => 63,
                "type" => "company",
                
                "base_url" => "companies",
                "page_url" => json_encode(["type" => "Service Providers"]),
                "title" => "ارائه دهندگان خدمات",
                "meta_data" => json_encode(["sellerType" => "Service Providers"]),
                "order_menu" => 5,
                "status" => true,
                "locale" => "fa",
                "category" => 19,
                "class" => ""
            ],
            [
                "id" => 64,
                "type" => "main_page",
                
                "base_url" => "home",
                "page_url" => null,
                "title" => "خانه",
                "meta_data" => "[]",
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 27,
                "class" => ""
            ],
            [
                "id" => 65,
                "type" => "page",
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 34, "page" => "\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627"]),
                "title" => "درباره ما",
                "meta_data" => json_encode(["value" => 34, "title" => "\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627", "url" => "home\/pages\/\u062f\u0631\u0628\u0627\u0631\u0647 \u0645\u0627\/34"]),
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 27,
                "class" => ""
            ],
            [
                "id" => 66,
                "type" => "page",
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 33, "page" => "\u0627\u0631\u062a\u0628\u0627\u0637 \u0628\u0627 \u0645\u0627"]),
                "title" => "ارتباط با ما",
                "meta_data" => json_encode(["value" => 33, "title" => "\u0627\u0631\u062a\u0628\u0627\u0637 \u0628\u0627 \u0645\u0627", "url" => "home\/pages\/\u0627\u0631\u062a\u0628\u0627\u0637 \u0628\u0627 \u0645\u0627\/33"]),
                "order_menu" => 8,
                "status" => true,
                "locale" => "fa",
                "category" => 27,
                "class" => ""
            ],
            [
                "id" => 67,
                "type" => "url",
                "base_url" => "",
                "page_url" => null,
                "title" => "PlacementIndia.com لورم ایپسوم</span>",
                "meta_data" => "[]",
                "order_menu" => 0,
                "status" => true,
                "locale" => "fa",
                "category" => 29,
                "class" => ""
            ],
            [
                "id" => 68,
                "type" => "url",
                "base_url" => "http://RealEstateIndia.com",
                "page_url" => null,
                "title" => "RealEstateIndia.com Real Estate India</span>",
                "meta_data" => "[]",
                "order_menu" => 1,
                "status" => true,
                "locale" => "fa",
                "category" => 29,
                "class" => ""
            ],
            [
                "id" => 69,
                "type" => "url",
                "base_url" => "http://TourTravelWorld.com",
                "page_url" => null,
                "title" => "TourTravelWorld.com Electronic Goods</span>",
                "meta_data" => "[]",
                "order_menu" => 2,
                "status" => true,
                "locale" => "fa",
                "category" => 29,
                "class" => ""
            ],
            [
                "id" => 70,
                "type" => "url",
                "base_url" => "http://MatrimonialsIndia.com ",
                "page_url" => null,
                "title" => "MatrimonialsIndia.com Find Soulmate in India</span>",
                "meta_data" => "[]",
                "order_menu" => 3,
                "status" => true,
                "locale" => "fa",
                "category" => 29,
                "class" => ""
            ],
            [
                "id" => 71,
                "type" => "url",
                
                "base_url" => "http://www.MatrimonialsIndia.com",
                "page_url" => null,
                "title" => "IndiaYellowPages.com Find Buyers & Seller</span>",
                "meta_data" => "[]",
                "order_menu" => 4,
                "status" => true,
                "locale" => "fa",
                "category" => 29,
                "class" => ""
            ],
            [
                "id" => 72,
                "type" => "url",
                
                "base_url" => "http://www.TradingBiz.com",
                "page_url" => null,
                "title" => "TradingBiz.com Business in India</span>",
                "meta_data" => "[]",
                "order_menu" => 5,
                "status" => true,
                "locale" => "fa",
                "category" => 29,
                "class" => ""
            ],
            [
                "id" => 73,
                "type" => "page",
                
                "base_url" => "home/pages",
                "page_url" => json_encode(["id" => 40, "page" => "40\/\u0634\u0631\u0627\u06cc\u0637 \u0648 \u0636\u0648\u0627\u0628\u0637"]),
                "title" => "شرایط و ضوابط	",
                "meta_data" => json_encode(["value" => 40, "title" => "\u0634\u0631\u0627\u06cc\u0637 \u0648 \u0636\u0648\u0627\u0628\u0637", "url" => "home\/pages\/40\/\u0634\u0631\u0627\u06cc\u0637 \u0648 \u0636\u0648\u0627\u0628\u0637\/40"]),
                "order_menu" => 9,
                "status" => true,
                "locale" => "fa",
                "category" => 15,
                "class" => ""
            ]
        ];
        foreach ($menu as $set) {
            \App\Menu::create($set);
        }
    }
}
