<?php

namespace App\Entities;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
	use HasApiTokens, Notifiable;
	
   	protected $table = 'pegawai';

   	protected $hidden = [
   		'created_at', 'updated_at', 'password', 'remember_token',
   	];
}
