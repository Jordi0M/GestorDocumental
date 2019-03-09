<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ventas;

class ControladorVentas extends Controller
{
    public function getDetalleVenta($id)
	{
		$ventas = DB::table('ventas')->where('id', $id)->get();

	    return view('clientes.DetalleVentas', ['ListaVentas' => $ventas]);
	}

	public function nuevaVenta(Request $request, $id)
	{

		$cliente = new ventas;
		$cliente->id_cliente = $id;
		$cliente->descripcion = $request->input('descripcion');
		$cliente->estado = $request->input('estado');
		$cliente->save();

		$cc = new ControladorClientes();
		$cc->getDetalleClientes($id);
		return $cc->getDetalleClientes($id);
		
	}
}
