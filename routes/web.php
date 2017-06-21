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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/plans', 'PlansController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/plan/{plan}', 'PlansController@show');

    Route::get('/braintree/token', 'BraintreeTokenController@token');

    Route::post('/subscribe', 'SubscriptionsController@store');

});