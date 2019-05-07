<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','IndexController@index');

Auth::routes();
Route::get('/move', 'Admin\CategoriesController@move');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/member/post-lead', 'HomeController@index')->name('members.post_lead');
Route::get('members/myaccount', 'HomeController@index')->name('members.myaccount');
Route::get('members/login', 'HomeController@index')->name('members.login');
Route::get('members/register', 'HomeController@index')->name('members.register');

Route::get('/member/manage-leads', 'HomeController@index')->name('members.manage_leads');
Route::get('/member/manage-enquiry', 'HomeController@index')->name('members.manage_enquiry');
Route::get('/member/edit-account', 'HomeController@index')->name('members.edit_account');
Route::get('/member/post_lead/{type_ad}', 'HomeController@index')->name('members.post_lead.type_ad');
Route::get('/member/newleads/{type_ad}', 'HomeController@index')->name('members.newleads.type_ad');
Route::get('/member/logout', 'HomeController@index')->name('members.logout');
Route::get('/pages/{id}/{page}', 'HomeController@index')->name('home.pages');
Route::get('home/buylead', 'HomeController@index')->name('home.buylead');
Route::get('home/advertisement', 'HomeController@index')->name('advertisement');
Route::get('home/help', 'HomeController@index')->name('help');
Route::get('home/contact_us', 'HomeController@index')->name('contact_us');
Route::get('home/companies', 'HomeController@index')->name('home.companies');
Route::get('home/buyselllead', 'HomeController@index')->name('home.buyselllead');
Route::get('home/selllead', 'HomeController@index')->name('home.selllead');
Route::get('home/articles', 'HomeController@index')->name('home.articles');
Route::get('home/sitemap', 'HomeController@index')->name('sitemap');
Route::get('home/products', 'HomeController@index')->name('home.products');
Route::get('home/categories', 'HomeController@index')->name('home.categories');
Route::get('companies', 'HomeController@index')->name('companies');
Route::get('testimonials', 'HomeController@index')->name('testimonials');
Route::post('newsLetter', 'NewsLettersController@send')->name('newsLetter');
Route::get('captcha', 'HomeController@index')->name('captcha');

Route::get('users/singIn', 'UserController@login')->name('singIn');
Route::post('users/email', 'UserController@email')->name('email');
Route::get('users/singUp', 'UserController@register')->name('singUp');
Route::post('users/store', 'UserController@store')->name('userStore');
Route::get('users/getInfo', 'UserController@getInfo')->name('getInfo');
Route::get('admin','Admin\IndexController@showLoginForm');
Route::middleware('auth')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
    Route::get('/','IndexController@index')->name('admin');
    Route::get('/profile','IndexController@index')->name('adminProfile');
    Route::get('/message','IndexController@index')->name('adminMessage');
//    Route::get('/productenquiry','IndexController@index')->name('productenquiry');
//    Route::get('/enquiry','IndexController@index')->name('enquiry');
//    Route::get('enquiry/request_call','IndexController@index')->name('enquiry-request_call');
//    Route::get('products','IndexController@index')->name('products');
//    Route::get('advertise','IndexController@index')->name('advertise');
//    Route::get('members','IndexController@index')->name('members');
//    Route::get('category','IndexController@index')->name('category');
//    Route::get('category/bulkupload','IndexController@index')->name('bulkupload');
//    Route::get('banners','IndexController@index')->name('banners');
//    Route::get('enquiry/request_call','IndexController@index')->name('enquiry/request_call');
//    Route::get('testimonial','IndexController@index')->name('testimonial');
//    Route::get('comment','IndexController@index')->name('comment');
//    Route::get('enquiry-request_call','IndexController@index')->name('enquiry-request_call');

    Route::resource('categories','CategoriesController');
    Route::get('categories/excel/upload','CategoriesController@formUpload');
    Route::post('categories/excel/import','CategoriesController@import')->name('categories.import');
    Route::resource('leads','LeadsController');
    Route::get('leads/excel/upload','LeadsController@Formupload');
    Route::post('leads/excel/upload','LeadsController@uploadExcel')->name('uploadExcelLead');
    Route::resource('requests','RequestsController');
    Route::resource('articles','ArticlesController');
    Route::resource('comments','CommentsController');
    Route::resource('members','MembersController');
    Route::resource('membership','MembershipController');
    Route::resource('orders','OrdersController');
    Route::resource('countries','CountriesController');
    Route::resource('satates','SatatesController');
    Route::resource('cities','CitiesController');
    Route::resource('/menus/categories','CategoriesMenuController',[
        'as' => 'menus'
    ]);
    Route::resource('menus','MenusController');
    Route::resource('newsletters','NewslettersController',[
        'as' => 'admin.newsletters'
    ]);
    Route::resource('templates/mail','TemplatesMailController');
    Route::resource('enquiries','EnquiriesController');
    Route::resource('banners','BannersController');
    Route::resource('advertises','AdvertisesController');
    Route::resource('testimonials','TestimonialsController');
    Route::resource('helps','HelpsController');
    Route::resource('portals','PortalsController');
    Route::resource('translators','TranslatorsController');
    Route::resource('sliders','SlidersController');
    Route::resource('search','SearchController');

});
