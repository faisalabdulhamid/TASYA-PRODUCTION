<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class KriteriaDistributor extends Model
{
    protected $table = 'kriteria_distributor';//kriteria_daerah_pemasaran

    protected $hidden = [
   		'created_at', 'updated_at', 'pivot'
   	];
}
