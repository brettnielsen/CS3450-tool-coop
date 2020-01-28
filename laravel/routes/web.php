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


Route::group(['prefix' => '/customer'], function() {
    Route::get('index', 'CustomerController@index');
    Route::get('new', 'CustomerController@new');
    Route::get('edit/{id}', 'CustomerController@edit');
    Route::get('store', 'CustomerController@store');
    Route::get('update/{id}', 'CustomerController@update');
    Route::get('destroy/{id}', 'CustomerController@destroy');
});

Route::group(['prefix' => '/item'], function() {
    Route::get('index', 'ItemController@index');
    Route::get('new', 'ItemController@new');
    Route::get('edit/{id}', 'ItemController@edit');
    Route::get('store', 'ItemController@store');
    Route::get('update/{id}', 'ItemController@update');
    Route::get('destroy/{id}', 'ItemController@destroy');
});

Route::group(['prefix' => '/reservation'], function() {
    Route::get('index', 'ReservationController@index');
    Route::get('new', 'ReservationController@new');
    Route::get('edit/{id}', 'ReservationController@edit');
    Route::get('store', 'ReservationController@store');
    Route::get('update/{id}', 'ReservationController@update');
    Route::get('destroy/{id}', 'ReservationController@destroy');
});
