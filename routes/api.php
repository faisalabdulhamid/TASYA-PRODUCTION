<?php

use Illuminate\Http\Request;


Route::apiResource('pegawai', 'PegawaiController')->middleware(['auth:api']);
Route::apiResource('produk', 'ProdukController')->middleware(['auth:api']);
Route::apiResource('provinsi', 'ProvinsiController')->middleware(['auth:api']);
Route::apiResource('kota', 'KotaController')->middleware(['auth:api']);
Route::apiResource('pelanggan', 'PelangganController')->middleware(['auth:api']);
Route::apiResource('pesanan', 'PesananController')->middleware(['auth:api']);
Route::apiResource('kriteria', 'KriteriaController')->middleware(['auth:api']);