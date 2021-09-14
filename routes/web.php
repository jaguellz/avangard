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
Route::get('/', function (){return view('welcome');});
Route::get('/weather', 'App\Http\Controllers\WeatherController@weather')->name('weather');
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders');
Route::get('/edit/{id}', 'App\Http\Controllers\OrderController@editPage')->name('edit');
Route::get('/orders/old', 'App\Http\Controllers\OrderController@oldOrders')->name('oldOrders');
Route::get('/orders/now', 'App\Http\Controllers\OrderController@nowOrders')->name('nowOrders');
Route::get('/orders/new', 'App\Http\Controllers\OrderController@newOrders')->name('newOrders');
Route::get('/orders/done', 'App\Http\Controllers\OrderController@doneOrders')->name('doneOrders');


