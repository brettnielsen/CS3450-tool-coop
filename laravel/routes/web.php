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


Route::group(['prefix' => '/user'], function() {
    Route::get('index', 'UserController@index')->middleware('auth');
    Route::get('new', 'UserController@new')->middleware('auth');
    Route::get('edit/{id}', 'UserController@edit')->middleware('auth');
    Route::post('store', 'UserController@store')->middleware('auth');
    Route::post('update/{id}', 'UserController@update')->middleware('auth');
    Route::post('destroy/{id}', 'UserController@destroy')->middleware('auth');
});

Route::group(['prefix' => '/item'], function() {
    Route::get('index', 'ItemController@index');
    Route::get('new', 'ItemController@new')->middleware('auth');
    Route::get('edit/{id}', 'ItemController@edit')->middleware('auth');
    Route::post('store', 'ItemController@store')->middleware('auth');
    Route::post('update/{id}', 'ItemController@update')->middleware('auth');
    Route::post('destroy/{id}', 'ItemController@destroy')->middleware('auth');
});

Route::group(['prefix' => '/reservation'], function() {
    Route::get('index', 'ReservationController@index')->middleware('auth');
    Route::get('new', 'ReservationController@new')->middleware('auth');
    Route::get('edit/{id}', 'ReservationController@edit')->middleware('auth');
    Route::post('store', 'ReservationController@store')->middleware('auth');
    Route::post('update/{id}', 'ReservationController@update')->middleware('auth');
    Route::post('destroy/{id}', 'ReservationController@destroy')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'ItemController@index');


Route::resource('user', 'UserController')->except('create', 'show');
Route::get('user/new', 'UserController@new');

Route::view('/terms', 'terms');
Route::view('/help', 'help');
