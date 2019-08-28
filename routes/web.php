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

Route::get('/home', 'JatuhTempoController@index');

Route::POST('/home', 'LoginController@Login');

Route::get('/lihatkamar', 'KamarController@index');
Route::get('/tambahkamar', 'KamarController@create');
Route::post('/tambahkamar', 'KamarController@store');
Route::get('/editkamar/{id}', 'KamarController@edit');
Route::put('/editkamar/{id}', 'KamarController@update');
Route::delete('/hapuskamar/{id}','KamarController@destroy');

Route::get('/lihatpenghuni', 'PenghuniController@index');
Route::get('/tambahpenghuni', 'PenghuniController@create');
Route::post('/tambahpenghuni', 'PenghuniController@store');
Route::get('/editpenghuni/{id}', 'PenghuniController@edit');
Route::put('/editpenghuni/{id}', 'PenghuniController@update');
Route::delete('/hapuspenghuni/{id}','PenghuniController@destroy');
Route::post('/penghuni/import', 'PenghuniController@importPenghuni');

Route::get('/mapping/lihat', 'MappingController@index');
Route::get('/mapping/tambah', 'MappingController@create');
Route::post('/mapping/tambah', 'MappingController@store');
Route::get('/mapping/edit/{id}', 'MappingController@edit');
Route::put('/mapping/edit', 'MappingController@update');
Route::delete('/mapping/hapus/{id}','MappingController@destroy');
Route::get('/ajaxGetKamar', 'MappingController@ajx')->name('ajaxGetKamar');

Route::get('/tambahpembayaran', 'PembayaranController@create');
Route::get('/lihatpembayaran', 'PembayaranController@index');
Route::post('/tambahpembayaran', 'PembayaranController@store');
Route::get('/editpembayaran/{thn}/{bln}/{id}', 'PembayaranController@edit');
Route::put('/editpembayaran/{id}', 'PembayaranController@update');
Route::delete('/hapuspembayaran/{thn}/{bln}/{id}','PembayaranController@destroy')->name('pembayaran.destroy');
Route::post('/ajxHapuspembayaran','PembayaranController@ajxDelete')->name('ajxDelete');
Route::get('/ajaxGetKeluar','PembayaranController@ajxGetKeluar')->name('ajxGetKeluar');
Route::get('/AjxShowTable','PembayaranController@AjxShowTable')->name('AjxShowTable');
Route::get('/ajxGetHarga', 'PembayaranController@ajxGetHarga')->name('ajxGetHarga');
Route::get('/ajxGetTagihan', 'PembayaranController@getAjxTagihan')->name('ajxGetTagihan');

Route::get('/tambahpengeluaran', 'PengeluaranController@create');
Route::get('/lihatpengeluaran', 'PengeluaranController@index');
Route::post('/tambahpengeluaran', 'PengeluaranController@store');
Route::get('/editpengeluaran/{id}', 'PengeluaranController@edit');
Route::put('/editpengeluaran/{id}', 'PengeluaranController@update');
Route::delete('/hapuspengeluaran/{id}','PengeluaranController@destroy');

Route::get('/tambahpemasukan', 'PemasukanController@create');
Route::get('/lihatpemasukan', 'PemasukanController@index');
Route::post('/tambahpemasukan', 'PemasukanController@store');
Route::get('/editpemasukan/{id}', 'PemasukanController@edit');
Route::put('/editpemasukan/{id}', 'PemasukanController@update');
Route::delete('/hapuspemasukan/{id}','PemasukanController@destroy');

Route::get('/laporankeuangan', 'KeuanganController@index');

Route::get('/tambahjaminankunci', 'JaminanKunciController@create');
Route::get('/lihatjaminankunci', 'JaminanKunciController@index');
Route::post('/tambahjaminankunci', 'JaminanKunciController@store');
Route::get('/editjaminankunci/{id}', 'JaminanKunciController@edit');
Route::put('/editjaminankunci/{id}', 'JaminanKunciController@update');
Route::delete('/hapusjaminankunci/{id}','JaminanKunciController@destroy')->name('jaminankunci.destroy');
