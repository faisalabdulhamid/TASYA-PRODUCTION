<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $hidden = [
   		'created_at', 'updated_at'
   	];}
