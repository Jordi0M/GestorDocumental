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

		$venta = new ventas;
		$venta->id_cliente = $id;
		$venta->descripcion = $request->input('descripcion');
		$venta->estado = $request->input('estado');
		$venta->save();

		$cc = new ControladorClientes();
		//$cc->getDetalleClientes($id);
		return $cc->getDetalleClientes($id);
		
	}

	public function guardarDatosEditadosVenta(Request $request, $id){

        $editar_venta = ventas::find($id);
        $editar_venta->descripcion = $request->input('descripcion');
        $editar_venta->estado = $request->input('estado');
        $editar_venta->save();

		return $this->getDetalleVenta($id);
	}

	public function SubirFichero(Request $request, $id)
	{
		/*
		//dd($request -> all());
		$cliente = new Cliente;
		$cliente->nombre = $request->input('nombre');
		$cliente->save();
		Cliente::create($request->all());
		//return "prueba";
		
		$clientes = DB::table('clientes')->get();
		return view('clientes.VistaClientes', ['ListaClientes' => $clientes]);
		*/


		//return $id;
		//$ventas = DB::table('ventas')->where('id', $id)->get();
		//dd($request->file('documento')->store('public'));

		dd($request);

	}
}
