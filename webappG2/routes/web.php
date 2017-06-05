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
    Route::get('/profile', 'TouristsController@profile')->name('tourist.profile');
    Route::post('/profile', 'TouristsController@update_tourist_avatar')->name('tourist.avatar.submit');
});


/**
 * Routes for a GUIDE
 */
Route::prefix('guide')->group(function () {
    Route::get('/profile', 'GuidesController@profile')->name('guide.profile');
    Route::post('/profile', 'GuidesController@update_guide_avatar')->name('guide.avatar.submit');
    Route::get('/login', 'Auth\GuideLoginController@showLoginForm')->name('guide.login');
    Route::post('/login', 'Auth\GuideLoginController@login')->name('guide.login.submit');
    Route::get('/', 'GuidesController@index')->name('guide.dashboard');
});

Auth::routes();