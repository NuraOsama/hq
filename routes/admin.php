<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group([ 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

        Route::get('/','App\Http\Controllers\Dashboard\DashboardController@index')->name('admin.dashboard');

        Route::get('/users','App\Http\Controllers\Dashboard\UserController@index')->name('users');
        Route::get('/users/details/{id}','App\Http\Controllers\Dashboard\UserController@details')
        ->name('user.details');
        Route::get('/users/addresses/{id}','App\Http\Controllers\Dashboard\UserController@addresses')
        ->name('user.addresses');
        Route::get('/users/reservations/{id}','App\Http\Controllers\Dashboard\UserController@reservations')
        ->name('user.reservations');

        Route::group(['prefix' => 'contact'] ,function(){
            Route::get('/','App\Http\Controllers\Dashboard\ContactController@index')
            ->name('contact');
            Route::get('/details/{id}','App\Http\Controllers\Dashboard\ContactController@details')
            ->name('contact.details');
        });

        Route::resource('countries','App\Http\Controllers\Dashboard\CountryController');
        Route::get('/countries/delete/{id}','App\Http\Controllers\Dashboard\CountryController@destroy')->name('countries.delete');
        Route::post('countries_update/{id}','App\Http\Controllers\Dashboard\CountryController@update')
        ->name('countries_update');
 
        Route::resource('tests','App\Http\Controllers\Dashboard\TestController');
        Route::get('upload_csv','App\Http\Controllers\Dashboard\TestController@upload_csv')->name('upload_csv');
        Route::post('upload_csv','App\Http\Controllers\Dashboard\TestController@save_csv')->name('upload.csv');
        Route::get('/tests/delete/{id}','App\Http\Controllers\Dashboard\TestController@delete')->name('tests.delete');
     
        Route::resource('appointments','App\Http\Controllers\Dashboard\AppointmentController');
        Route::get('/appointments/delete/{id}','App\Http\Controllers\Dashboard\AppointmentController@delete')
        ->name('appointments.delete');
        Route::get('/reservations','App\Http\Controllers\Dashboard\ReservationController@reservations')
        ->name('reservations');
 
        Route::get('/reservation/details/{id}','App\Http\Controllers\Dashboard\ReservationController@reservationDetails')
        ->name('visit.details');
 
        Route::get('/reservation/confirm/{id}','App\Http\Controllers\Dashboard\ReservationController@reservationConfirm')
        ->name('visit.confirm');
 
        Route::get('/reservation/accept/{id}','App\Http\Controllers\Dashboard\ReservationController@reservationAccept')
        ->name('visit.accept');

        Route::get('/reservation/result/{id}','App\Http\Controllers\Dashboard\ReservationController@reservationResult')
        ->name('visit.result');

        Route::post('/reservation/accept','App\Http\Controllers\Dashboard\ReservationController@reservationAcceptPost')
        ->name('result.accept');
 
        Route::get('/reservation/filter','App\Http\Controllers\Dashboard\ReservationController@reservations')
        ->name('reservation_filter');
 
        Route::resource('offers','App\Http\Controllers\Dashboard\OfferController');
        Route::get('/offers/delete/{id}','App\Http\Controllers\Dashboard\OfferController@destroy')
        ->name('offers.delete');

  
 
        Route::get('/show/result/{id}','App\Http\Controllers\Dashboard\ReservationController@showResult')
        ->name('show.result');
 
        Route::post('/reservation/store','App\Http\Controllers\Dashboard\ReservationController@resultStore')
        ->name('result.store');
 

        
    });

 

    Route::get('admin/login', 'App\Http\Controllers\Dashboard\LoginController@login')
    ->name('admin.login');



    Route::get('logout', 'App\Http\Controllers\Dashboard\LoginController@logout')->name('admin.logout');
    Route::post('admin/login', 'App\Http\Controllers\Dashboard\LoginController@postLogin')
    ->name('admin.post.login');
    Route::get('profile/edit', 'App\Http\Controllers\Dashboard\ProfileController@editProfile')
    ->name('edit.profile');
    Route::put('profile/update', 'App\Http\Controllers\Dashboard\ProfileController@updateprofile')
    ->name('update.profile');



});
