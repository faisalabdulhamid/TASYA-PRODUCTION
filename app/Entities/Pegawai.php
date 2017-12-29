<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
	use Notifiable;
	
   	protected $table = 'pegawai';

   	protected $hidden = [
   		'created_at', 'updated_at', 'password', 'remember_token',
   	];
}
