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

Route::get('/', 'PageController@login');

Route::get('/home', 'PageController@home');

Route::POST('/home', 'PageController@home');

Auth::routes();

Route::get('/tambahkamar', 'KamarController@create');

Route::post('/tambahkamar', 'KamarController@store');

Route::get('/lihatkamar', 'KamarController@index');
