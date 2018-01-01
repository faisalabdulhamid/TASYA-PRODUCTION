<?php

Auth::routes();

Route::get('', 'ClientController@index')->name('client');
Route::get('/kategori/{kategori}', 'ClientController@ProductByKategori')->name('fing-by-kategori');
Route::get('/produk/{id}', 'ClientController@ProductById')->name('fing-by-id');
Route::get('/kategori', 'ClientController@getKategori')->name('kategori');

Route::group(['prefix' => 'tasya'], function ()
{
	Route::get('/', 'HomeController@index')->name('home');

	Route::resource('pegawai', 'PegawaiController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'pegawai']
	]);
	Route::resource('produk', 'ProdukController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'produk']
	]);
	Route::resource('provinsi', 'ProvinsiController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'provinsi']
	]);
	Route::resource('kota', 'KotaController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'kota']
	]);
	Route::resource('pelanggan', 'PelangganController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'pelanggan']
	]);
	Route::get('distributor', 'PelangganController@distributor')->name('distributor');

	Route::resource('pesanan', 'PesananController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'pesanan']
	]);
	Route::resource('kriteria-daerah-pemasaran', 'KriteriaDaerahPemasaranController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'kriteria-daerah-pemasaran']
	]);
	Route::resource('calon-daerah-pemasaran', 'CalonDaerahPemasaranController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'calon-daerah-pemasaran']
	]);
	Route::get('perhitungan-pemasaran', 'CalonDaerahPemasaranController@hitung')->name('perhitungan-pemasaran');
	Route::post('calon-daerah-pemasaran/{id}/check', 'CalonDaerahPemasaranController@check');

	Route::resource('calon-distributor', 'CalonDistributorController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'calon-distributor']
	]);
	Route::get('perhitungan-distributor', 'CalonDistributorController@hitung')->name('perhitungan-distributor');
	Route::resource('kriteria-distributor', 'KriteriaDistributorController', [
		'except' => ['edit', 'create'],
		'names' => ['index' => 'kriteria-distributor']
	]);


	Route::group(['middleware' => 'auth', 'prefix'=>'select', 'as'=>'select.'], function(){
		Route::get('provinsi', function(){
			$provinsi = App\Entities\Provinsi::all();
			return response()->json($provinsi);
		})->name('provinsi');
		Route::get('kota/{provinsi_id}', function($provinsi_id){
			$kota = App\Entities\Kota::where('provinsi_id', $provinsi_id)->get();
			return response()->json($kota);
		})->name('kota');
		Route::get('pelanggan', function(){
			$pelanggan = App\Entities\Pelanggan::all();
			return response()->json($pelanggan);
		})->name('pelanggan');
		Route::get('produk', function(){
			$produk = App\Entities\Produk::all();
			return response()->json($produk);
		})->name('produk');
		Route::get('kriteria', function(){
			$kriteria = App\Entities\KriteriaDaerahPemasaran::all();
			return response()->json($kriteria);
		})->name('kriteria');
		Route::get('kriteria-distributor', function(){
			$kriteria = App\Entities\KriteriaDistributor::all();
			return response()->json($kriteria);
		})->name('kriteria-distributor');
	});
});