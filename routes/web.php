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

//Route::get('/home', 'PageController@home');

Route::POST('/home', 'LoginController@Login');

Auth::routes();

Route::get('/lihatkamar', 'KamarController@index');
Route::get('/tambahkamar', 'KamarController@create');
Route::post('/tambahkamar', 'KamarController@store');
Route::get('/editkamar/{id}', 'KamarController@edit');
Route::put('/editkamar/{id}', 'KamarController@update');
Route::delete('/hapuskamar/{id}','KamarController@destroy')->name('kamar.destroy');

Route::get('/lihatpenghuni', 'PenghuniController@index');
Route::get('/tambahpenghuni', 'PenghuniController@create');
Route::post('/tambahpenghuni', 'PenghuniController@store');
Route::get('/editpenghuni/{id}', 'PenghuniController@edit');
Route::put('/editpenghuni/{id}', 'PenghuniController@update');
Route::delete('/hapuspenghuni/{id}','PenghuniController@destroy')->name('penghuni.destroy');

Route::get('/tambahpembayaran', 'PembayaranController@create');
Route::get('/lihatpembayaran', 'PembayaranController@index');
Route::post('/tambahpembayaran', 'PembayaranController@store');
Route::get('/editpembayaran/{id}', 'PembayaranController@edit');
Route::put('/editpembayaran/{id}', 'PembayaranController@update');
Route::delete('/hapuspembayaran/{id}','PembayaranController@destroy')->name('pembayaran.destroy');
Route::get('/laporanpembayaran/', 'PembayaranController@show');
Route::put('/laporanpembayaran/','PembayaranController@sort');

Route::get('/tambahpinjaman', 'PinjamanController@create');
Route::get('/lihatpinjaman', 'PinjamanController@index');
Route::post('/tambahpinjaman', 'PinjamanController@store');
Route::get('/bayarpinjaman/{id}', 'PinjamanController@edit');
Route::put('/bayarpinjaman/{id}', 'PinjamanController@update');
Route::get('/editpinjaman/{id}', 'PinjamanController@edit2');
Route::put('/editpinjaman/{id}', 'PinjamanController@update2');
Route::delete('/hapuspinjaman/{id}','PinjamanController@destroy')->name('pinjaman.destroy');

Route::get('/tambahjaminankunci', 'JaminanKunciController@create');
Route::get('/lihatjaminankunci', 'JaminanKunciController@index');
Route::post('/tambahjaminankunci', 'JaminanKunciController@store');
Route::get('/editjaminankunci/{id}', 'JaminanKunciController@edit');
Route::put('/editjaminankunci/{id}', 'JaminanKunciController@update');
Route::delete('/hapusjaminankunci/{id}','JaminanKunciController@destroy')->name('jaminankunci.destroy');
