<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cliente;
use App\Http\Requests\ClienteNuevoRequest;
use App\Http\Requests\ClienteEditarRequest;

class ControladorClientes extends Controller
{
    public function getListadoClientes()
	{
		$clientes = DB::table('clientes')->get()->paginate(5);
		

	    return view('clientes.VistaClientes', ['ListaClientes' => $clientes]);
	}

	public function getDetalleClientes($id)
	{
		$clientes = DB::table('clientes')->where('id', $id)->get();

		$ventas = DB::table('ventas')->where('id_cliente', $id)->get();

	    return view('clientes.DetalleClientes', ['ListaClientes' => $clientes], ['ListaVentas' => $ventas]);
	}

	public function guardarCliente(ClienteNuevoRequest $request)
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
	public function guardarDatosEditadosCliente(ClienteEditarRequest $request, $id){

		$editar_cliente = Cliente::where('id', $id)->first();

		$editar_cliente->update($request->all());

		return $this->getDetalleClientes($id);
	}
}
