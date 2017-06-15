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

use App\Events\MessagePosted;

// -------------------------------------------------------------------------

/**
 * Routes for a GUEST
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'InfoController@about')->name('about');
Route::get('/', function () {
   return view('welcome');
});
// -------------------------------------------------------------------------

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
// -------------------------------------------------------------------------

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
    // Guide dashboard
    Route::get('/', 'GuidesController@index')->name('guide.dashboard');
});
// -------------------------------------------------------------------------

Route::get('/chat', 'ChatsController@index')->name('guide.chat');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/availability', 'InfoController@availability')->name('guide.availability');

Route::prefix('guides')->group(function () {
    Route::get('/{id}', 'InfoController@display_guide_per_id')->name('guide.page.get');
    Route::get('/{city}', 'InfoController@get_guides_city')->name('guides.city');
    Route::post('/', 'InfoController@location_submit')->name('location.submit');
});
// -------------------------------------------------------------------------

/**
 * Authentication routes for tourists
 */
Auth::routes();
// -------------------------------------------------------------------------

/**
 * CHAT routes
 * Note: Only available to guides
 */

/**
Route::get('/chat', function () {
    return view('chat');
})->middleware('auth:guide');

Route::get('/messages', function () {
    // return App\Message::all();
    return App\Message::with('guide')->get();
})->middleware('auth:guide');

Route::post('/messages', function () {
    // Store the new message
    $guide = Auth::user();
    $message = $guide->messages()->create([
        'message' => request()->get('message')
    ]);
    // Announce that a new message has been posted
    broadcast(new MessagePosted($message, $guide))->toOthers();

    return ['status' => 'Success'];
})->middleware('auth:guide');
*/
// -------------------------------------------------------------------------

