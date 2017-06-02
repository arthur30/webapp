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

Route::get('/', function () {
   return view('welcome');
});

Route::get('/profile', 'TouristsController@profile');
Route::post('/profile', 'TouristsController@update_user_avatar');
Route::get('/tourists', 'TouristsController@index'); // calls the controller specifying the method from it
                                                     // index is used to show all of a resource

// controller => GuidesController + Eloquent model => Guide + migration => create_guides_table
Route::get('/guide', 'GuidesController@index');
Route::get('/guides/{id}', 'GuidesController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'InfoController@about');
