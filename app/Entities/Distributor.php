<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
	protected $table = 'distributor';

	protected $hidden = [
		'created_at', 'updated_at'
	];

	// protected $appends = ['nama_pelanggan'];

	public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
	}

	// public function getNamaPelangganAttribute()
	// {
	// 	return $this->pelanggan()->first();
	// }
}
