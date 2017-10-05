<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    $events = \App\Models\Event::with('eventCategory')->get();
    $slides = \App\Slider::with('event')->get();
    return view('frontend.index', compact('events', 'slides'));
});

Auth::routes();

/**
 * Backend Routes
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/category', 'Util\EventCategoryController');
    Route::resource('/account', 'AccountController');
    Route::put('/gateway/{id}', 'Util\SettingsController@updateGateway');
    Route::resource('/event', 'EventController', ['except' => 'show']);
    Route::resource('/featured-event', 'FeaturedEventController', ['except' => ['create', 'store', 'show']]);
    Route::resource('/rate', 'TicketTypeController');
    Route::resource('/ticket', 'TicketController');
    Route::resource('/order', 'OrderController');
    Route::resource('/page', 'Util\PageController', ['except' => 'show']);
    Route::resource('/role', 'Authority\RoleController');
    Route::resource('/permission', 'Authority\PermissionController');
    Route::resource('/invoice', 'Finance\InvoiceController');
    Route::resource('/user', 'UserController');
    Route::resource('/slider', 'SliderController', ['except' => 'show']);
    Route::get('/settings', 'Util\SettingsController@index');
    Route::put('/settings', 'Util\SettingsController@update');
});

/**
 * Frontend Routes
 */
Route::get('/event/{slug}', 'EventController@show');
Route::resource('/order', 'OrderController');
Route::get('/proceed', 'CartController@proceed');
Route::get('/payment', 'CartController@payment');
Route::post('/order-complete', 'CartController@validatePayment');
Route::get('/organizer/{name}', 'AccountController@organizer');

Route::resource('/attendee', 'AttendeeController', ['except' => 'show']);
Route::get('/account', 'AttendeeController@show');

Route::post('/api-detur', 'AttendeeController@storeDetur');

/**
 * APIs
 */
Route::get('/e/{id}', 'EventController@getEventInfo');
Route::get('/tickets/{eventID}', 'TicketTypeController@getTickets');

Route::get('/{slug}', 'Util\PageController@show');