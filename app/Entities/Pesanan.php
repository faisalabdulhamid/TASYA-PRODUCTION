<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $hidden = [
   		'created_at', 'updated_at'
   	];
}
