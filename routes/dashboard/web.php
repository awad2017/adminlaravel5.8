<?php
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

         Route::get('/index', 'DashboardController@index')->name('index');
         //Route is USERD
            Route::resource('users', 'UserController')->except(['show']);

        });
    });

