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

Route::get('/home', 'HomeController@index')->name('home');
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
    Route::get('/','IndexController@index')->name('dashbord');
    Route::get('/profile','IndexController@index')->name('adminProfile');
    Route::get('/message','IndexController@index')->name('adminMessage');
    Route::get('/productenquiry','IndexController@index')->name('productenquiry');
    Route::get('/enquiry','IndexController@index')->name('enquiry');
    Route::get('enquiry/request_call','IndexController@index')->name('enquiry-request_call');
    Route::get('products','IndexController@index')->name('products');
    Route::get('advertise','IndexController@index')->name('advertise');
    Route::get('members','IndexController@index')->name('members');
    Route::get('category','IndexController@index')->name('category');
    Route::get('category/bulkupload','IndexController@index')->name('bulkupload');
    Route::get('banners','IndexController@index')->name('banners');
    Route::get('enquiry/request_call','IndexController@index')->name('enquiry/request_call');
    Route::get('testimonial','IndexController@index')->name('testimonial');
    Route::get('comment','IndexController@index')->name('comment');
    Route::get('enquiry-request_call','IndexController@index')->name('enquiry-request_call');

});
