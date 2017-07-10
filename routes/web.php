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
    Route::resource('/rate', 'TicketTypeController');
    Route::resource('/ticket', 'TicketController');
    Route::resource('/order', 'OrderController');
});

Route::get('/event/{slug}', 'EventController@show');
Route::post('/cart', 'CartController@addItem');
Route::get('/cart', 'CartController@show');
Route::get('/remove/{id}', 'CartController@deleteItem');
Route::get('/cart-destroy', 'CartController@destroyCart');

Route::resource('/attendee', 'AttendeeController');