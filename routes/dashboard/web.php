<?php


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'  ])->group(function (){

    Route::get('/index','DashboardController@index')->name('index');
    Route::delete('deleteImage/{id}','DoorController@destroyImage')->name('deleteImage');
    Route::post('editImage/{id}','DoorController@editImage');
    Route::post('addImage','DoorController@addImage');
    Route::resource('users','UserController')->except(['show']);
    Route::resource('doors','DoorController')->except(['show']);
    Route::resource('handrails','HandrailController')->except(['show']);
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
