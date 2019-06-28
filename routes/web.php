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
Route::get('/settings', 'HomeController@settings')->name('settings');
Route::get('/venues', 'BusinessController@index')->name('venues');
Route::get('/venues/{id}','BusinessController@show');
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/employees', 'ItemController@index')->name('employees');
