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

	public function getDetalleClientes()
	{
		$clientes = DB::table('clientes')->get();

	    return view('clientes.DetalleClientes', ['ListaClientes' => $clientes]);
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
