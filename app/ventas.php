<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{

	protected $guarded = array();

	public function scopeSearch($query, $dato_a_buscar, $id)
	{	

		return $query->where('id_cliente', "=", $id)
		->where('estado' , 'LIKE', "%$dato_a_buscar%")
		->orWhere('id_cliente', "=", $id)
		->Where('updated_at' , 'LIKE', "%$dato_a_buscar%");
	}
}
