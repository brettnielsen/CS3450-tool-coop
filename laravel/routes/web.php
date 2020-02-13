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
    Route::get('index', 'UserController@index');
    Route::get('new', 'UserController@new');
    Route::get('edit/{id}', 'UserController@edit');
    Route::post('store', 'UserController@store');
    Route::post('update/{id}', 'UserController@update');
    Route::post('destroy/{id}', 'UserController@destroy');
});

Route::group(['prefix' => '/item'], function() {
    Route::get('index', 'ItemController@index');
    Route::get('new', 'ItemController@new');
    Route::get('edit/{id}', 'ItemController@edit');
    Route::post('store', 'ItemController@store');
    Route::post('update/{id}', 'ItemController@update');
    Route::post('destroy/{id}', 'ItemController@destroy');
});

Route::group(['prefix' => '/reservation'], function() {
    Route::get('index', 'ReservationController@index');
    Route::get('new', 'ReservationController@new');
    Route::get('edit/{id}', 'ReservationController@edit');
    Route::post('store', 'ReservationController@store');
    Route::post('update/{id}', 'ReservationController@update');
    Route::post('destroy/{id}', 'ReservationController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('user', 'UserController')->except('create', 'show');
Route::get('user/new', 'UserController@new');
