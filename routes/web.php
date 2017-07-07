<?php


Route::get('/', function () {
    $events = \App\Models\Event::all();
    return view('frontend.index', compact('events'));
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/categories', 'Util\EventCategoryController@index');
    Route::resource('/account', 'AccountController');
    Route::resource('/event', 'EventController', ['except' => 'show']);
    Route::get('/event/{slug}', 'EventController@show');
    Route::resource('/rate', 'TicketTypeController');
    Route::resource('/ticket', 'TicketController');
});
