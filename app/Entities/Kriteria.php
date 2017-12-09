<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $hidden = [
   		'created_at', 'updated_at'
   	];
}
