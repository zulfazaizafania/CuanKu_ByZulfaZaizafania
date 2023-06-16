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


Route::get('/', 'DashboardController@index')->name('dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('transactions', 'TransactionController');
Route::get('/undo/{id}', 'TransactionController@undo')->name('transactions.undo');

Route::resource('moneys', 'MoneyController');
Route::get('/initiate', 'MoneyController@initiate')->name('moneys.initiate');
