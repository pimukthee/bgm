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

Route::get('/', 'EventController@showAtHome')->name('home');

Route::get('/register', 'RegistrationController@create');
Route::get('/login', 'SessionController@create')->name('login');
Route::get('/logout', 'SessionController@destroy');
Route::get('/users', 'UserController@list');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::get('/users/{user}/following', 'UserController@followings');
Route::get('/users/{user}/followers', 'UserController@followers');
Route::get('/users/{user}/invite', 'UserController@invite');
Route::post('/register', 'RegistrationController@store');
Route::post('/login', 'SessionController@store');
Route::post('/users/{user}/follow', 'UserController@follow');
Route::post('/users/{user}/unfollow', 'UserController@unfollow');
Route::post('/users/{user}/update', 'UserController@update');
Route::post('/users/{user}/invited', 'UserController@invited');


Route::get('/events/create', 'EventController@create');
Route::get('/events/created', 'EventController@created');
Route::get('/events/{event}/rank', 'EventController@rank');
Route::get('/events', 'EventController@fetch');
Route::get('/events/recent','EventController@recent');
Route::get('/events/{event}/participants', 'EventController@participants');
Route::get('/events/{event}', 'EventController@show');
Route::post('/events/store', 'EventController@store');
Route::post('/events/{event}/end', 'EventController@end');
Route::post('/events/{event}/delete', 'EventController@delete');
Route::post('/events/cancel/{event}', 'EventController@cancel');
Route::post('/join/{event}', 'EventController@join');


Route::get('/categories','CategoriesController@show');

Route::get('/games/{game}', 'GameController@show');

Route::post('/search', 'SearchController@search');

Route::get('/markAsRead', function() {
    auth()->user()->unreadNotifications->markAsRead();
});