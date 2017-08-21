<?php


Route::get('/', function () {
    $events = \App\Models\Event::with('eventCategory')->get();
    return view('frontend.index', compact('events'));
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/categories', 'Util\EventCategoryController@index');
    Route::resource('/account', 'AccountController');
    Route::post('/account/add-gateway', 'AccountController@addGateway');
    Route::resource('/event', 'EventController', ['except' => 'show']);
    Route::get('/event/featured', 'EventController@featuredEvents');
    Route::resource('/rate', 'TicketTypeController');
    Route::resource('/ticket', 'TicketController');
    Route::resource('/order', 'OrderController');
    Route::resource('/page', 'Util\PageController', ['except' => 'show']);
});

Route::get('/event/{slug}', 'EventController@show');
Route::post('/cart', 'CartController@addItem');
Route::get('/cart', 'CartController@show');
Route::get('/remove/{id}', 'CartController@deleteItem');
Route::get('/cart-destroy', 'CartController@destroyCart');
Route::get('/proceed', 'CartController@proceed');
Route::get('/payment', 'CartController@payment');
Route::post('/order-complete', 'CartController@validatePayment');
Route::get('/organizer/{name}', 'AccountController@organizer');

Route::resource('/attendee', 'AttendeeController', ['except' => 'show']);
Route::get('/account', 'AttendeeController@show');

/**
 * APIs
 */
Route::get('/e/{id}', 'EventController@getEventInfo');
Route::get('/tickets/{eventID}', 'TicketTypeController@getTickets');

Route::get('/{slug}', 'Util\PageController@show');