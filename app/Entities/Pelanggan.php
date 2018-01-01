<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $hidden = [
   		'created_at', 'updated_at'
   	];

   	protected $appends= ['nama_kota'];

   	public function kota()
   	{
   		return $this->belongsTo(Kota::class, 'kota_id');
   	}

   	public function getNamaKotaAttribute()
   	{
      // $kota = $this->kota->first();
   		return 'Kota';
   	}

    public function distributor()
    {
      return $this->hasMany(Distributor::class, 'pelanggan_id');
    }

    public function calon()
    {
      return $this->hasOne(CalonDistributor::class, 'pelanggan_id');
    }

    public function pesanan()
    {
      return $this->hasMany(Pesanan::class, 'pelanggan_id');
    }
}
