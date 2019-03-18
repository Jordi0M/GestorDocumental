<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{

	protected $guarded = array();

	public function scopeSearch($query, $dato_a_buscar, $id)
	{	

		if ($dato_a_buscar == "sin" || $dato_a_buscar == "sin vender") {
			$estado = 0;
		}
		else if ($dato_a_buscar == "ven" || $dato_a_buscar == "vend" || $dato_a_buscar == "vendido") {
			$estado = 1;
		}
		else{
			$estado = $dato_a_buscar;
		}
		return $query->where('id_cliente', "=", $id)
		->where('estado' , 'LIKE', "%$estado%")
		->orWhere('id_cliente', "=", $id)
		->Where('updated_at' , 'LIKE', "%$dato_a_buscar%");
	}
}
