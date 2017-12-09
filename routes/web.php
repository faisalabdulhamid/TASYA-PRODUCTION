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

// Route::get('/', function () {
//     return view('layouts.template');
// })->middleware;
Route::get('/temp/login', function () {
    return view('layouts.login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/pegawai', 'PegawaiController@index')
	->name('pegawai')
	->middleware('auth');
Route::get('/produk', 'ProdukController@index')
	->name('produk')
	->middleware('auth');
Route::get('/pelanggan', 'PelangganController@index')
	->name('pelanggan')
	->middleware('auth');
Route::get('/produk', 'ProdukController@index')
	->name('produk')
	->middleware('auth');
Route::get('/pesanan', 'PesananController@index')
	->name('pesanan')
	->middleware('auth');
Route::get('/kriteria', 'KriteriaController@index')
	->name('kriteria')
	->middleware('auth');
