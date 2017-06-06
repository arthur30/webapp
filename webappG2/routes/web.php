<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * Routes for a GUEST
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'InfoController@about');
Route::get('/', function () {
   return view('welcome');
});


/**
 * Routes for a TOURIST
 */
Route::prefix('tourist')->group(function () {
    // Routes from left side of navbar
    Route::get('/bookings', 'TouristsController@bookings')->name('tourist.bookings');
    Route::get('/bookings/upcoming', 'TouristsController@bookings_upcoming')->name('tourist.bookings.upcoming');
    Route::get('/bookings/past', 'TouristsController@bookings_past')->name('tourist.bookings.past');
    Route::get('/requests', 'TouristsController@requests')->name('tourist.requests');
    // Routes for profile and account from right side of navbar
    Route::get('/account', 'TouristsController@account')->name('tourist.account');
    Route::get('/profile', 'TouristsController@profile')->name('tourist.profile');
    Route::post('/profile', 'TouristsController@update_tourist_avatar')->name('tourist.avatar.submit');
    // Tourist dashboard
    Route::get('/', 'TouristsController@index')->name('tourist.dashboard');
});


/**
 * Routes for a GUIDE
 */
Route::prefix('guide')->group(function () {
    // Routes from left side of navbar
    Route::get('/bookings', 'GuidesController@bookings')->name('guide.bookings');
    Route::get('/bookings/upcoming', 'GuidesController@bookings_upcoming')->name('guide.bookings.upcoming');
    Route::get('/bookings/past', 'GuidesController@bookings_past')->name('guide.bookings.past');
    Route::get('/requests', 'GuidesController@requests')->name('guide.requests');
    // Routes for profile and account from right side of navbar
    Route::get('/account', 'GuidesController@account')->name('guide.account');
    Route::get('/profile', 'GuidesController@profile')->name('guide.profile');
    Route::post('/profile', 'GuidesController@update_guide_avatar')->name('guide.avatar.submit');
    // Authentication routes for guides
    Route::get('/login', 'Auth\GuideLoginController@showLoginForm')->name('guide.login');
    Route::post('/login', 'Auth\GuideLoginController@login')->name('guide.login.submit');
    Route::get('/register', 'Auth\GuideRegisterController@showRegistrationForm')->name('guide.register');
    Route::post('/register', 'Auth\GuideRegisterController@register')->name('guide.register.submit');
    // Chat route
    Route::get('/chat', 'GuidesChatController@chat')->name('guide.chat');
    // Guide dashboard
    Route::get('/', 'GuidesController@index')->name('guide.dashboard');
});

// Authentication routes for tourists
Auth::routes();