<?php

use Illuminate\Http\Request;


Route::apiResource('pegawai', 'PegawaiController')->middleware(['auth:api']);
Route::apiResource('produk', 'ProdukController')->middleware(['auth:api']);
Route::apiResource('provinsi', 'ProvinsiController')->middleware(['auth:api']);
Route::apiResource('kota', 'KotaController')->middleware(['auth:api']);
Route::apiResource('pelanggan', 'PelangganController')->middleware(['auth:api']);
Route::get('distributor', 'PelangganController@distributor')->middleware(['auth:api']);

Route::apiResource('pesanan', 'PesananController')->middleware(['auth:api']);
Route::apiResource('kriteria-daerah-pemasaran', 'KriteriaDaerahPemasaranController')->middleware(['auth:api']);
Route::apiResource('calon-daerah-pemasaran', 'CalonDaerahPemasaranController')->middleware(['auth:api']);
Route::post('calon-daerah-pemasaran/{id}/check', 'CalonDaerahPemasaranController@check')->middleware(['auth:api']);
Route::apiResource('kriteria-distributor', 'KriteriaDistributorController')->middleware(['auth:api']);

Route::group(['middleware' => 'auth:api', 'prefix'=>'select'], function(){
	Route::get('provinsi', function(){
		$provinsi = App\Entities\Provinsi::all();
		return response()->json($provinsi);
	});
	Route::get('kota/{provinsi_id}', function($provinsi_id){
		$kota = App\Entities\Kota::where('provinsi_id', $provinsi_id)->get();
		return response()->json($kota);
	});
	Route::get('pelanggan', function(){
		$pelanggan = App\Entities\Pelanggan::all();
		return response()->json($pelanggan);
	});
	Route::get('produk', function(){
		$produk = App\Entities\Produk::all();
		return response()->json($produk);
	});
	Route::get('kriteria', function(){
		$kriteria = App\Entities\KriteriaDaerahPemasaran::all();
		return response()->json($kriteria);
	});
});