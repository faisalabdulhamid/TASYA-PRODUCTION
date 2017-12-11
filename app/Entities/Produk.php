<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $hidden = [
   		'created_at', 'updated_at', 'pivot'
   	];

   	protected $fillable = [
   		'kode', 'nama', 'harga'
   	];
}
