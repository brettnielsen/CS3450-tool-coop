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
    Route::get('store', 'UserController@store')->middleware('auth');
    Route::post('update/{id}', 'UserController@update')->middleware('auth');
    Route::post('destroy/{id}', 'UserController@destroy')->middleware('auth');
});

Route::group(['prefix' => '/item'], function() {
    Route::get('index', 'ItemController@index');
    Route::get('new', 'ItemController@new')->middleware('auth');
    Route::get('edit/{id}', 'ItemController@edit')->middleware('auth');
    Route::post('store', 'ItemController@store')->middleware('auth');
    Route::post('update/{id}', 'ItemController@update')->middleware('auth');
    Route::get('destroy/{id}', 'ItemController@destroy')->middleware('auth');
});

Route::group(['prefix' => '/reservation'], function() {
    Route::get('index', 'ReservationController@index')->middleware('auth');
    Route::get('new', 'ReservationController@new')->middleware('auth');
    Route::get('edit/{id}', 'ReservationController@edit')->middleware('auth');
    Route::post('store', 'ReservationController@store')->middleware('auth');
    Route::post('update/{id}', 'ReservationController@update')->middleware('auth');
    Route::get('destroy/{id}', 'ReservationController@destroy')->middleware('auth');
    Route::get('choose-date/{reservationID}', 'ReservationController@chooseDate')->middleware('auth');
    Route::post('choose-date/{reservationID}', 'ReservationController@setDate')->middleware('auth');
    Route::get('choose-user/{reservationID}/{userID}', 'ReservationController@setUser')->middleware('auth');
    Route::get('add-item-to-reservation/{itemID}/{reservationID?}', 'ReservationController@AddItem');
    Route::get('delete-reservation-item/{reservationID}/{reservationItemID?}', 'ReservationController@removeItem');
    Route::get('check-availability/{reservationID}', 'ReservationController@checkAvailability');
    Route::get('mark-checked-out/{reservationID}', 'ReservationController@checkOut');
    Route::get('mark-checked-in/{reservationID}', 'ReservationController@checkin');
});

Route::group(['prefix' => 'reports'], function() {
    Route::get('index', 'ReportsController@index')->middleware('auth');

    Route::get('reservations', 'ReportsController@reservationReport')->middleware('auth');
    Route::get('customers', 'ReportsController@customerReport')->middleware('auth');
    Route::get('items', 'ReportsController@itemReport')->middleware('auth');

    Route::group(['prefix' => 'criteria'], function() {
        Route::get('reservations', 'ReportsController@reservationReportCriteria')->middleware('auth');
        Route::get('customers', 'ReportsController@customerCriteria')->middleware('auth');
        Route::get('items', 'ReportsController@itemCriteria')->middleware('auth');
    });

});

Auth::routes();

Route::get('/home', 'ItemController@index');


Route::resource('user', 'UserController')->except('create', 'show');
Route::get('user/new', 'UserController@new');

Route::view('/terms', 'terms');
Route::view('/help', 'help');
Route::view('/projects', "projects");
