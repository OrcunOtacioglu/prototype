<?php


Route::get('/', function () {
    $events = \App\Models\Event::with('eventCategory')->get();
    return view('frontend.index', compact('events'));
});

Auth::routes();

/**
 * Backend Routes
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');

    // Organizer Account
    Route::resource('/account', 'AccountController');
    Route::post('/account/add-gateway', 'AccountController@addGateway');

    // Event Related
    Route::get('/categories', 'Util\EventCategoryController@index');
    Route::resource('/event', 'EventController', ['except' => 'show']);
    Route::get('/event/featured', 'EventController@featuredEvents');
    Route::resource('/rate', 'TicketTypeController');
    Route::resource('/ticket', 'TicketController');

    // Finance Module
    Route::resource('/order', 'OrderController');
    Route::resource('/invoice', 'Finance\InvoiceController');
    Route::resource('/sale', 'OrderController');

    // Manage User's and Roles
    Route::resource('/role', 'Authority\RoleController');
    Route::resource('/permission', 'Authority\PermissionController');
    Route::resource('/user', 'UserController');

    // CMS
    Route::resource('/page', 'Util\PageController', ['except' => 'show']);
});

/**
 * Frontend Routes
 */

// Event Related
Route::get('/event/{slug}', 'EventController@show');
Route::get('/organizer/{name}', 'AccountController@organizer');

// Purchase Steps
Route::post('/cart', 'CartController@addItem');
Route::get('/cart', 'CartController@show');
Route::get('/remove/{id}', 'CartController@deleteItem');
Route::get('/cart-destroy', 'CartController@destroyCart');
Route::get('/proceed', 'CartController@proceed');
Route::get('/payment', 'CartController@payment');
Route::post('/order-complete', 'CartController@validatePayment');

// Attendee Realted
Route::resource('/attendee', 'AttendeeController', ['except' => 'show']);
Route::get('/account', 'AttendeeController@show');

/**
 * APIs
 */
Route::get('/e/{id}', 'EventController@getEventInfo');
Route::get('/tickets/{eventID}', 'TicketTypeController@getTickets');

Route::get('/{slug}', 'Util\PageController@show');