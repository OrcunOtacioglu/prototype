<?php


Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/account', 'AccountController');
    Route::resource('/event', 'EventController');
});
