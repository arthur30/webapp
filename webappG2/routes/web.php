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

Route::get('/tourists', 'TouristsController@index'); // calls the controller specifying the method from it
                                                     // index is used to show all of a resource

Route::get('/guides', 'GuidesController@index');
Route::get('/guides/{id}', 'GuidesController@show');
