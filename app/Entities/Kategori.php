<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'url';
    public $incrementing  = false;
    protected $fillable = ['url', 'nama'];
    protected $hidden = ['created_at', 'updated_at'];

    public function produks()
    {
    	return $this->hasMany(Kategori::class, 'kategori_id');
    }
}
