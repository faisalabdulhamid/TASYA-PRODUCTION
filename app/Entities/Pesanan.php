<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $appends = ['nama_pelanggan', 'total_bayar'];
    // protected $visible = ['tanggal'];

    protected $hidden = [
   		'created_at', 'updated_at'
   	];

   	public function pelanggan()
   	{
   		return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
   	}

   	public function pegawai()
   	{
   		return $this->belongsTo(Pegawai::class, 'pegawai_id');
   	}

   	public function produks()
   	{
   		return $this->belongsToMany(Produk::class, 'detail_pesanan', 'pesanan_id', 'produk_id')->withPivot('jumlah', 'sub_total');
   	}

    public function getNamaPelangganAttribute()
    {
      return $this->pelanggan()->first()->nama;
    }

   	public function getTotalBayarAttribute()
   	{
   		return $this->produks()->get()->sum('pivot.sub_total');
   	}
}
