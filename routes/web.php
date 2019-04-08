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
    Route::get('/','IndexController@index');

});
