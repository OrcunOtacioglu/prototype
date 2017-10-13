<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    $events = \App\Models\Event::with('eventCategory')->get();

    $eligibleEvents = \App\Models\Event::eligibleEvents($events);
    $slides = \App\Slider::with('event')->get();
    return view('frontend.index', compact('eligibleEvents', 'slides'));
});

/**
 * Authentication Routes
 */

// Dashboard Authentication Routes...
Route::get('dashboard/login', 'Auth\LoginController@showLoginForm')->name('dashboard.login');
Route::post('dashboard/login', 'Auth\LoginController@login');
Route::post('dashboard/logout', 'Auth\LoginController@logout')->name('dashboard.logout');
// Dashboard Registration Routes...
Route::get('dashboard/register', 'Auth\RegisterController@showRegistrationForm')->name('dashboard.register');
Route::post('dashboard/register', 'Auth\RegisterController@register');

// Account Authentication Routes
Route::get('login', 'Auth\Account\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\Account\LoginController@login');
Route::post('logout', 'Auth\Account\LoginController@logout')->name('logout');
// Account Registration Routes
Route::get('register', 'Auth\Account\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\Account\RegisterController@register');
// Account Password Reset Routes..
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Backend Routes
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/category', 'Util\EventCategoryController');
    Route::resource('/account', 'AccountController');
    Route::put('/gateway/{id}', 'Util\SettingsController@updateGateway');
    Route::resource('/event', 'EventController', ['except' => 'show']);
    Route::resource('/featured-event', 'FeaturedEventController', ['except' => 'create']);
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
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
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