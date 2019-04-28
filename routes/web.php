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
Route::group(['prefix' => 'admin', /* 'middleware' => 'admin' */], function () {
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
    Route::post('handle-login','Auth\LoginController@handleLogin')->name('handle-login');
    Route::get('/register', 'Auth\RegisterController@register')->name('register');
    Route::post('handle-register','Auth\RegisterController@handleRegister')->name('handle-register');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

/* Web routes for user */
Route::group(['prefix' => 'user'], function () {
    //
});

Route::get('/', 'UserController@index')->name('home');
