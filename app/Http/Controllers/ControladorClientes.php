<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cliente;

class ControladorClientes extends Controller
{
    public function getListadoClientes()
	{
		$clientes = DB::table('clientes')->get();

	    return view('clientes.VistaClientes', ['ListaClientes' => $clientes]);
	}

	public function getDetalleClientes($id)
	{
		$clientes = DB::table('clientes')->where('id', $id)->get();
		
		var_dump(json_decode($clientes, true));
		//var_dump($clientes[0]);
		//return $clientes[$id];

	    //return view('clientes.DetalleClientes', ['ListaClientes' => $clientes[$id]]);
	}

	public function guardarCliente(Request $request)
	{
		//dd($request -> all());
		/*
		$cliente = new Cliente;
		$cliente->nombre = $request->input('nombre');
		$cliente->save();
		*/
		Cliente::create($request->all());
		//return "prueba";
		
		$clientes = DB::table('clientes')->get();
		return view('clientes.VistaClientes', ['ListaClientes' => $clientes]);
	}
}
