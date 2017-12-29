<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $hidden = [
   		'created_at', 'updated_at'
   	];

   	protected $fillable = [
   		'kota', 'provinsi_id'
   	];

   	public function provinsi()
   	{
   		return $this->belongsTo(Provinsi::class, 'provinsi_id');
   	}

    public function calonPemasaran()
    {
      return $this->hasMany(CalonDaerahPemasaran::class, 'kota_id');
    }
}
