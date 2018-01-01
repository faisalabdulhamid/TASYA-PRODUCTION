<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CalonDistributor extends Model
{
    protected $table = 'calon_distributor';
    protected $appends = ['nama_pelanggan'];

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

    public function kriterias()
    {
    	return $this->belongsToMany(KriteriaDistributor::class, 'detail_calon_distributor', 'calon_distributor_id', 'kriteria_id')->withPivot('nilai');
    }

    public function getNamaPelangganAttribute()
    {
        return $this->pelanggan()->first()->nama;
    }

    public static function boot()
    {
        static::addGlobalScope('notdistributor', function (Builder $builder) {
            $builder->has('pelanggan.distributor', 0);
        });
    }
}
