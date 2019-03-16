<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   // protected $filleable = ['nombre', 'documento', 'direccion', 'provincia', 'localidad', 'cp', 'telefono', 'mail'];
	protected $guarded = array();

	public function scopeSearch($query, $dato_a_buscar)
	{	
		return $query->where('nombre' , 'LIKE', "%$dato_a_buscar%")
		->orWhere('telefono' , 'LIKE', "%$dato_a_buscar%")
		->orWhere('localidad' , 'LIKE', "%$dato_a_buscar%")
		->orWhere('documento' , 'LIKE', "%$dato_a_buscar%");

	}
}
