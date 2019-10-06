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

Route::get('/','HomeController@index');
Route::get('doors','HomeController@doors');//
Route::get('doors/woods','HomeController@doors_woods');
Route::get('doors/aluminum','HomeController@doors_aluminums');
Route::get('doors/irons','HomeController@doors_irons');
Route::get('handrails','HomeController@handrails');
Route::get('handrails/normal','HomeController@handrails_normal');
Route::get('handrails/stainless','HomeController@handrails_stainless');
Route::get('windows','HomeController@windows');//window_item
Route::get('windows/zipper','HomeController@windows_zipper');
Route::get('windows/hinge','HomeController@windows_hinge');
Route::get('windows/fixed','HomeController@windows_fixed');
Route::get('windows/inverting','HomeController@windows_inverting');//db_action
Route::get('windows/db_action','HomeController@windows_db_action');//db_action
Route::get('kitchens','HomeController@kitchens');
Route::get('window_item/{id}','HomeController@window_item');
Route::get('door_item/{id}','HomeController@door_item');
Route::get('kitchen_item/{id}','HomeController@kitchen_item');
Route::get('/clear_cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
