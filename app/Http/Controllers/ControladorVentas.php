<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ControladorVentas extends Controller
{
    public function getDetalleVenta($id)
	{
		$clientes = DB::table('clientes')->where('id', $id)->get();

		$ventas = DB::table('ventas')->where('id_cliente', $id)->get();

	    return view('clientes.DetalleVentas', ['ListaClientes' => $clientes], ['ListaVentas' => $ventas]);
	}
}
