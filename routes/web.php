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


Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');


// Bahan
Route::get('/master/bahan', 'BahanController@index')->name('master.bahan.index');
Route::post('/master/bahan/store', 'BahanController@store')->name('master.bahan.store');
Route::get('/master/bahan/destroy/{id}', 'BahanController@destroy');
Route::get('/master/bahan/getdata', 'BahanController@getdata')->name('master.bahan.getdata');
Route::get('/master/bahan/fetchdata', 'BahanController@fetchdata')->name('master.bahan.fetchdata');


// Satuan
Route::get('/master/satuan', 'SatuanController@index')->name('master.satuan.index');
Route::post('/master/satuan/store', 'SatuanController@store')->name('master.satuan.store');
Route::get('/master/satuan/destroy/{id}', 'SatuanController@destroy');
Route::get('/master/satuan/getdata', 'SatuanController@getdata')->name('master.satuan.getdata');
Route::get('/master/satuan/fetchdata', 'SatuanController@fetchdata')->name('master.satuan.fetchdata');

// Menu
Route::get('/master/menu', 'MenuController@index')->name('master.menu.index');

// Kategori
Route::get('/master/kategori', 'KategoriController@index')->name('master.kategori.index');
Route::post('/master/kategori/store', 'KategoriController@store')->name('master.kategori.store');
Route::get('/master/kategori/destroy/{id}', 'KategoriController@destroy');
Route::get('/master/kategori/getdata', 'KategoriController@getdata')->name('master.kategori.getdata');
Route::get('/master/kategori/fetchdata', 'KategoriController@fetchdata')->name('master.kategori.fetchdata');

// Pegawai
Route::get('/master/pegawai', 'PegawaiController@index')->name('master.pegawai.index');

// User
Route::get('/master/user', 'UserController@index')->name('master.user.index');

// Tax & Services
Route::get('/master/tax-services', 'TaxServicesController@index')->name('master.tax-services.index');

// // Merchants
// Route::get('/master/merchants', 'MerchantsController@index')->name('master.merchants.index');

// Kasir
Route::get('/transaksi/kasir', 'KasirController@index')->name('transaksi.kasir.index');

// Biaya Lain Lain
Route::get('/transaksi/biaya-lain-lain', 'BiayaLainLainController@index')->name('transaksi.biaya-lain-lain.index');
