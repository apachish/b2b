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

Auth::routes(['verify' => true]);
Auth::routes();

//Route move
Route::get('/move', 'Admin\CategoriesController@move');
Route::get('translators/move','Admin\TranslatorsController@move');
Route::get('page/move','Admin\PagesController@move');
//Route Guest
Route::get('/','IndexController@index');
Route::get('/home', 'IndexController@index')->name('home');
Route::get('reCaptcha', 'IndexController@reCaptcha')->name('reCaptcha');
Route::get('/pages/{page_slug?}', 'PagesController@index')->name('home.pages');
Route::get('/articles/{article_slug?}', 'ArticlesController@index')->name('home.articles');
Route::get('/articles/{article_slug?}/comment', 'ArticlesController@loadComment')->name('home.articles.comments');
Route::post('/articles/{article_slug?}/comment/send', 'ArticlesController@sendComment')->name('home.articles.comments.send');
Route::get('/contact_us', 'ContactUsController@index')->name('home.contact_us');
Route::get('/site-map', 'IndexController@siteMap')->name('home.site-map');
Route::get('advertisement', 'AdvertisementController@index')->name('advertisement');
Route::get('help', 'HelpsController@index')->name('help');
Route::post('search', 'SearchController@index')->name('search');
Route::get('refer-friend', 'InviteController@form')->name('refer-friend');
Route::post('refer-friend/send', 'InviteController@send')->name('refer-friend.send');
Route::get('testimonials/{slug?}', 'TestimonialsController@index')->name('testimonials');
Route::post('newsLetter', 'NewsLettersController@send')->name('newsLetter');
Route::post('post_request', 'ContactUsController@postRequest')->name('post_request');
Route::post('featured/{type?}/category/{slug_category?}', 'FeaturedsController@postRequest')->name('home.featured');
Route::get('users/checkLogin', 'AuthController@checkLogin')->name('checkLogin');
Route::prefix('auth')
    ->group(function () {
        Route::get('singIn', 'AuthController@showLoginForm')->name('singIn');
        Route::post('login', 'AuthController@login')->name('popup-login');
        Route::get('singUp', 'AuthController@register')->name('singUp');
        Route::post('checkRegister', 'AuthController@checkRegister')->name('checkRegister');
        Route::post('store', 'AuthController@store')->name('users.store');
        Route::get('getInfo', 'AuthController@getInfo')->name('getInfo');
        Route::get('forgot/password', 'ForgotPasswordController@showForm')->name('forgot.password');
    });
Route::prefix('members')
    ->group(function () {});
Route::prefix('categories')
    ->group(function () {
        Route::get('/{slug_categories?}', 'CategoriesController@index')->name('home.categories');
        Route::get('/{slug_categories?}/leads/{slug_leads?}', 'LeadsController@index')->name('home.categories.leads');

    });
Route::prefix('companies')
    ->group(function () {
        Route::get('/list', 'CompaniesController@index')->name('home.companies.list');
        Route::get('/profile/{slug_companies}', 'CompaniesController@index')->name('home.companies.info');
        Route::get('/{slug_categories?}', 'CategoriesController@index')->name('home.companies');
        Route::get('/{slug_categories?}/leads/{slug_leads?}', 'LeadsController@index')->name('home.companies.leads');

    });

Route::prefix('leads')
    ->group(function () {
        Route::get('buy/{slug_categories?}', 'CategoriesController@index')->name('home.leads.buy');
        Route::get('buy/{slug_categories?}/leads/{slug_leads?}', 'LeadsController@index')->name('home.leads.buy.leads');
        Route::get('sell/{slug_categories?}', 'CategoriesController@index')->name('home.leads.sell');
        Route::get('sell/{slug_categories?}/leads/{slug_leads?}', 'LeadsController@index')->name('home.leads.sell.leads');
        Route::get('/{slug_categories?}', 'CategoriesController@index')->name('home.leads');
        Route::get('/{slug_categories?}/leads/{slug_leads?}', 'LeadsController@index')->name('home.leads.leads');
    });

Route::middleware('auth')
    ->group(function () {

        //Route login user
        Route::get('members/my-account', 'HomeController@index')->name('members.my-account');
        Route::get('/member/manage-leads', 'HomeController@index')->name('members.leads.list');
        Route::get('/member/manage-enquiry', 'HomeController@index')->name('members.leads.enquiry');
        Route::get('/member/edit-account', 'HomeController@index')->name('members.edit_account');
        Route::get('/member/post_lead/{type_ad?}', 'HomeController@index')->name('members.leads.post.type_ad');
        Route::get('/member/newleads/{type_ad}', 'HomeController@index')->name('members.newleads.type_ad');
        Route::get('/member/logout', 'HomeController@index')->name('members.logout');

        //Route login admin

        Route::middleware('admin')
            ->prefix('admin')
            ->namespace('Admin')
            ->group(function () {
//                Route::get('admin','Admin\IndexController@showLoginForm');

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
                Route::get('leads/get/dataTable','LeadsController@dataTable')->name('leads.dataTable');

                Route::get('leads/excel/upload','LeadsController@Formupload');
                Route::post('leads/excel/upload','LeadsController@uploadExcel')->name('uploadExcelLead');
                Route::resource('requests','RequestsController');
                Route::resource('pages','PagesController');
                Route::post('pages/status/change/{id}','PagesController@changeStatus')->name('pages.status');
                Route::get('pages/get/dataTable','PagesController@dataTable')->name('pages.dataTable');

                Route::resource('articles','ArticlesController');
                Route::post('articles/status/change/{id}','ArticlesController@changeStatus')->name('articles.status');
                Route::post('articles/action/row','ArticlesController@actionRow')->name('articles.action');
                Route::get('articles/get/dataTable','ArticlesController@dataTable')->name('articles.dataTable');
                Route::resource('comments','CommentsController');
                Route::resource('members','MembersController');
                Route::resource('membership','MembershipController');
                Route::resource('orders','OrdersController');
                Route::resource('countries','CountriesController');
                Route::resource('states','SatatesController');
                Route::resource('cities','CitiesController');
                Route::resource('/menus/categories','CategoriesMenuController',[
                    'as' => 'menus'
                ]);
                Route::resource('menus','MenusController');
                Route::resource('newsletters','NewslettersController',[
                    'as' => 'admin'
                ]);
                Route::resource('templates/mail','TemplatesMailController');
                Route::resource('enquiries','EnquiriesController');
                Route::resource('banners','BannersController');
                Route::resource('advertises','AdvertisesController');
                Route::resource('testimonials','TestimonialsController');
                Route::resource('helps','HelpsController');
                Route::resource('portals','PortalsController');
                Route::resource('translators','TranslatorsController');
                Route::post('translators/change','TranslatorsController@change')->name('admin.translates.change');
                Route::get('translators/get/dataTable','TranslatorsController@dataTable')->name('admin.translates.dataTable');
                Route::resource('sliders','SlidersController');
                Route::resource('search','SearchController');

            });
    });











