<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/detail/{slug}', 'DetailController@index')
    ->name('detail');

Route::get('/order/{slug}', 'OrderController@index')
    ->name('order');

Route::get('/checkout/{id}', 'CheckoutController@index')
    ->name('checkout');

Route::post('/checkout/{id}', 'CheckoutController@proccess')
    ->name('checkout-proccess');

Route::post('/checkout/create/{id}', 'CheckoutController@create')
    ->name('checkout-create');

// Route::post('/checkout/{id}', 'CheckoutController@proccess')
//     ->name('checkout-proccess')
//     ->middleware(['auth', 'verified']);

// Route::get('/checkout/{id}', 'CheckoutController@index')
//     ->name('checkout')
//     ->middleware(['auth', 'verified']);

// Route::post('/checkout/create/{id}', 'CheckoutController@create')
//     ->name('checkout-create')
//     ->middleware(['auth', 'verified']);

// Route::get('/checkout/remove/{id}', 'CheckoutController@remove')
//     ->name('checkout-remove')
//     ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout-success');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin', 'verified'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('travel-package', 'TravelPackageController');

        
        Route::resource('gallery', 'GalleryController');
        Route::get('/gallery/create/{id}', 'GalleryController@create')
            ->name('gallery-create');

        Route::resource('transaction', 'TransactionController');


        Route::resource('itinerary', 'ItineraryController');
        Route::get('/itinerary/create/{id}', 'ItineraryController@create')
            ->name('itinerary-create');
    });


Auth::routes(['verify' => true]);