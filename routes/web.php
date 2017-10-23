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

Route::get('/', 'EventController@fetchEvents')->name('home');

Route::get('/register', 'RegistrationController@create');
Route::get('/login', 'SessionController@create');
Route::get('/logout', 'SessionController@destroy');
Route::get('/users', 'UserController@list');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::post('/users/{user}/update', 'UserController@update');

Route::get('/events/create', 'EventController@create');

Route::post('/join/{event}', 'EventController@join');
Route::post('/events/store', 'EventController@store');
Route::post('/register', 'RegistrationController@store');
Route::post('/login', 'SessionController@store');

