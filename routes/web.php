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

Route::get('/', 'AppController@home');
Route::get('/items', 'ItemController@listItems');
Route::post('/items', 'ItemController@createItem');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();