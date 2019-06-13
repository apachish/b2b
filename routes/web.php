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
        Route::get('/profile/{slug_companies}', 'CompaniesController@show')->name('home.companies.info');
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
        Route::get('members/myaccount', 'UsersController@profile')->name('members.my-account');
        Route::get('members/my-account', 'UsersController@profile')->name('members.my-account');
        Route::get('/member/manage-leads', 'LeadsController@index')->name('members.leads.list');
        Route::get('/member/manage-enquiry', 'HomeController@index')->name('members.leads.enquiry');
        Route::get('/member/edit-account', 'HomeController@index')->name('members.edit_account');
        Route::post('/member/post_lead/store', 'LeadsController@store')->name('members.leads.post.store');
        Route::get('/member/post_lead/edit/{slug_lead}', 'LeadsController@edit')->name('members.leads.post.edit');
        Route::get('/member/post_lead/update/{slug_lead}', 'LeadsController@update')->name('members.leads.post.update');
        Route::post('/member/post_lead/delete/{slug_lead}', 'LeadsController@store')->name('members.leads.post.delete');
        Route::get('/member/post_lead/{type_ad?}', 'LeadsController@create')->name('members.leads.post.type_ad');
        Route::get('/member/newleads/{type_ad}', 'HomeController@index')->name('members.newleads.type_ad');
        Route::get('/member/requests', ' RequestsController@index')->name('members.request.index');
        Route::get('/member/requests/{id}', ' RequestsController@show')->name('members.request.show');
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

                Route::resource('categories','CategoriesController',[
                    'as' => 'admin'
                ]);
                Route::get('categories/excel/upload','CategoriesController@formUpload')->name('admin.categories.excel.upload');
                Route::post('categories/excel/import','CategoriesController@import')->name('categories.import');
                Route::resource('leads','LeadsController',[
                    'as' => 'admin'
                ]);
                Route::get('leads/get/dataTable','LeadsController@dataTable')->name('admin.leads.dataTable');
                Route::post('leads/status/change/{id}','LeadsController@changeStatus')->name('admin.leads.status');
                Route::get('leads/details/form/{id}','LeadsController@formDetails')->name('admin.leads.details.form');
                Route::post('leads/details/update/{id}','LeadsController@details')->name('admin.leads.details.update');

                Route::get('leads/excel/upload','LeadsController@Formupload')->name('admin.leads.excel.upload');
                Route::post('leads/excel/upload','LeadsController@uploadExcel')->name('admin.uploadExcelLead');
                Route::resource('requests','RequestsController',[
                    'as' => 'admin.leads'
                ]);
                Route::resource('pages','PagesController',[
                    'as' => 'admin'
                ]);
                Route::post('pages/status/change/{id}','PagesController@changeStatus')->name('admin.pages.status');
                Route::get('pages/get/dataTable','PagesController@dataTable')->name('admin.pages.dataTable');

                Route::resource('articles','ArticlesController',[
                    'as' => 'admin'
                ]);
                Route::post('articles/status/change/{id}','ArticlesController@changeStatus')->name('admin.articles.status');
                Route::post('articles/action/row','ArticlesController@actionRow')->name('admin.articles.action');
                Route::get('articles/get/dataTable','ArticlesController@dataTable')->name('admin.articles.dataTable');
                Route::resource('comments','CommentsController',[
                    'as' => 'admin'
                ]);
                Route::resource('members','MembersController',[
                    'as' => 'admin'
                ]);
                Route::post('members/status/change/{id}','MembersController@changeStatus')->name('admin.members.status');
                Route::post('members/action/row','MembersController@actionRow')->name('admin.members.action');
                Route::get('members/get/dataTable','MembersController@dataTable')->name('admin.members.dataTable');
                Route::resource('memberships','MembershipController',[
                    'as' => 'admin.members'
                ]);
                Route::get('memberships/get/dataTable','MembershipController@dataTable')->name('admin.memberships.dataTable');
                Route::post('memberships/status/change/{id}','MembershipController@changeStatus')->name('admin.memberships.status');

                Route::resource('orders','OrdersController',[
                    'as' => 'admin.members'
                ]);
                Route::resource('countries','CountriesController',[
                    'as' => 'admin'
                ]);
                Route::resource('states','SatatesController',[
                    'as' => 'admin'
                ]);
                Route::resource('cities','CitiesController',[
                    'as' => 'admin'
                ]);
                Route::resource('/menus/categories','CategoriesMenuController',[
                    'as' => 'admin.menus'
                ]);
                Route::resource('menus','MenusController',[
                    'as' => 'admin'
                ]);
                Route::resource('newsletters','NewslettersController',[
                    'as' => 'admin'
                ]);
                Route::resource('templates/mail','TemplatesMailController',[
                    'as' => 'admin'
                ]);
                Route::resource('enquiries','EnquiriesController',[
                    'as' => 'admin'
                ]);

                Route::resource('banners','BannersController',[
                    'as' => 'admin'
                ]);
                Route::resource('advertises','AdvertisesController',[
                    'as' => 'admin'
                ]);
                Route::resource('testimonials','TestimonialsController',[
                    'as' => 'admin'
                ]);
                Route::resource('helps','HelpsController',[
                    'as' => 'admin'
                ]);
                Route::resource('portals','PortalsController',[
                    'as' => 'admin'
                ]);
                Route::resource('translators','TranslatorsController',[
                    'as' => 'admin'
                ]);
                Route::post('translators/change','TranslatorsController@change')->name('admin.translates.change');
                Route::get('translators/get/dataTable','TranslatorsController@dataTable')->name('admin.translates.dataTable');
                Route::get('searchList','SearchsController@index')->name('admin.searchList');
                Route::resource('sliders','SlidersController',[
                    'as' => 'admin'
                ]);
                Route::resource('search','SearchController',[
                    'as' => 'admin'
                ]);

            });
    });











