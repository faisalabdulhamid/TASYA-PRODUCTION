<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CalonDaerahPemasaran extends Model
{
    protected $table = 'calon_daerah_pemasaran';

    protected $hidden = [
    	'created_at', 'updated_at'
    ];

    protected $appends = ['nama_kota', 'nama_provinsi'];

    public function kota()
    {
    	return $this->belongsTo(Kota::class, 'kota_id');
    }

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function kriterias()
    {
        return $this->belongsToMany(KriteriaDaerahPemasaran::class, 'detail_calon_daerah_pemasaran', 'calon_daerah_pemasaran_id', 'kriteria_id')->withPivot('nilai');
    }

    public function getNamaKotaAttribute()
    {
        return $this->kota()->first()->kota;
    }

    public function getNamaProvinsiAttribute()
    {
        $kota = $this->kota()->first(); 
        return $kota->provinsi()->first()->provinsi;
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 1);
    }
}
