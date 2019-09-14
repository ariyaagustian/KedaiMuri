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


Route::get('/dashboard', function () {
    return view('dashboard.index');
});


Route::get('/master/bahan', 'BahanController@index');
Route::get('/master/bahan/json', 'BahanController@json');
Route::post('/master/bahan/store', 'BahanController@store')->name('master.bahan.store');
Route::get('/master/bahan/getdata', 'BahanController@getdata')->name('master.bahan.getdata');
Route::get('/master/bahan/fetchdata', 'BahanController@fetchdata')->name('master.bahan.fetchdata');


Route::get('/master/menu', function () {
    return view('master.menu.index');
});
Route::get('/master/kategori', function () {
    return view('master.kategoriMenu.index');
});
Route::get('/master/pegawai', function () {
    return view('master.pegawai.index');
});
Route::get('/master/user', function () {
    return view('master.user.index');
});
Route::get('/master/tax-services', function () {
    return view('master.tax-services.index');
});
Route::get('/master/merchants', function () {
    return view('master.merchants.index');
});


Route::get('/transaksi/kasir', function () {
    return view('transaksi.kasir.index');
});
