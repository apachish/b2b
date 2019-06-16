<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('search','Api\SearchController@index');
Route::get('categories/show/{id}','Api\CategoriesController@show');
Route::get('categories/{id?}/{status?}/{language?}','Api\CategoriesController@index');
Route::get('pages/{id?}/{status?}/{language?}','Api\PagesController@index');

//Route::resource('categories','Admin\CategoriesController');
