<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class KriteriaDaerahPemasaran extends Model
{
    protected $table = 'kriteria';//kriteria_daerah_pemasaran

    protected $hidden = [
   		'created_at', 'updated_at', 'pivot'
   	];
}
