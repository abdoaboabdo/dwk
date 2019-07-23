<?php


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){

    Route::get('/index','DashboardController@index')->name('index');
    Route::resource('users','UserController')->except(['show']);
    Route::resource('doors','DoorController')->except(['show']);
    Route::resource('windows','WindowController')->except(['show']);
    Route::resource('kitchens','KitchenController')->except(['show']);
});
//Route::group([
//        'prefix' => LaravelLocalization::setLocale(),
//        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//    ],
//    function()
//    {
//
//
//    });
