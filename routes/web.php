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

/* Tour api */


/* Web routes for admin */
Route::group(['prefix' => 'admin'/* , 'middleware' => 'admin' */], function () {
    Route::resource('tours', 'TourController');
    Route::put('/tours/updatestatus/{tour}', 'TourController@updateStatus');
    Route::resource('days', 'DayController');
    Route::resource('images', 'ImageController');
    Route::resource('services', 'ServiceController');
    Route::get('/', 'AdminController@index')->name('dashboard');
});

/* Web routes for authen */
Route::group(['prefix' => 'account'], function () {
    Route::get('login', 'Auth\LoginController@login')->name('login');
});

/* Web routes for user */
Route::group(['prefix' => 'user'], function () {
    //
});

Route::get('/', 'UserController@index')->name('home');
