<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   // protected $filleable = ['nombre', 'documento', 'direccion', 'provincia', 'localidad', 'cp', 'telefono', 'mail'];
	protected $guarded = array();

}
