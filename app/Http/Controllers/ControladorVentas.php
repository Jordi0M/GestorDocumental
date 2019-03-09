<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ventas;

class ControladorVentas extends Controller
{
    public function getDetalleVenta($id)
	{
		$clientes = DB::table('clientes')->where('id', $id)->get();

		$ventas = DB::table('ventas')->where('id_cliente', $id)->get();

	    return view('clientes.DetalleVentas', ['ListaClientes' => $clientes], ['ListaVentas' => $ventas]);
	}

	public function nuevaVenta(Request $request, $id)
	{

		$cliente = new ventas;
		$cliente->id_cliente = $id;
		$cliente->descripcion = $request->input('descripcion');
		$cliente->estado = $request->input('estado');
		$cliente->save();

			//Cliente::create($request->all());
		//return "prueba";
		/*
		$clientes = DB::table('clientes')->get();
		return view('clientes.VistaClientes', ['ListaClientes' => $clientes]);
		*/
	}
}
