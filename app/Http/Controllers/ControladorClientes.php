<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ControladorClientes extends Controller
{
    public function getListadoClientes()
	{
		$clientes = DB::table('clientes')->get();

	    return view('clientes.ViewClients', ['ListClients' => $clientes]);
	}
}
