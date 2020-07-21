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


Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'PostController@index')->middleware('auth');
Route::get('/p/create', 'PostController@create')->middleware('auth');
Route::post('/p', 'PostController@store')->middleware('auth');
Route::get('/p/{post}', 'PostController@show');

Route::get('/explore', 'ExploreController@index');