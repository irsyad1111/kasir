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

Route::get('/', function () {
    return view('welcome');
});

Route::get('main', function() {
    return view('panel.main');
});

Route::get('dashboard', function() {
    return view('layouts.dashboard');
});

//Produk
Route::get('produk', 'ProdukController@index');
Route::get('addproduk', 'ProdukController@create');
Route::post('produk', 'ProdukController@store');
Route::get('editproduk/{id}', 'ProdukController@edit');
Route::post('editproduk/{id}', 'ProdukController@update');
Route::delete('deleteproduk/{id}', 'ProdukController@destroy');

//Kategori
Route::get('kategori', 'KategoriController@index');
Route::post('kategori', 'KategoriController@store');
Route::post('editkategori', 'KategoriController@edit');
Route::get('editor/{id}', 'KategoriController@tadi');
Route::post('editor/{id}', 'KategoriController@update');
Route::delete('hapus/{id}', 'KategoriController@destroy');

//transaksi
Route::get('transaksi', 'TransaksiController@index');
Route::get('dotransaksi', 'TransaksiController@dotransaksi');
Route::get('tampil', 'TransaksiController@tampilkanSession');

//
//
Route::get('carts', 'TransaksiController@cartstore');

Route::get('/cart','TransaksiController@index')->name('transaksi.index');
Route::post('/cart','TransaksiController@add')->name('transaksi.add');
Route::post('/cart/conditions','TransaksiController@addCondition')->name('transaksi.addCondition');
Route::delete('/cart/conditions','TransaksiController@clearCartConditions')->name('transaksi.clearCartConditions');
Route::get('/cart/details','TransaksiController@details')->name('transaksi.details');
Route::delete('/cart/{id}','TransaksiController@delete')->name('transaksi.delete');

Route::post('addtran','ProdukController@addtran');
