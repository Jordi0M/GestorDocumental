<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}