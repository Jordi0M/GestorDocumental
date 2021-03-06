<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cliente;
use App\ventas;
use App\Http\Requests\ClienteNuevoRequest;
use App\Http\Requests\ClienteEditarRequest;
use Illuminate\Contracts\Support\Jsonable;

class ControladorClientes extends Controller
{
    public function getListadoClientes(Request $request)
	{
		//con esto, le pasaremos al "Cliente.php" el scope para que haga el where
		$clientes = Cliente::search($request->busqueda)->paginate(4);
		$busqueda = $request->get("busqueda");
		$clientes->appends(['busqueda' => $busqueda])->links();

		//antigua:
		//$clientes = DB::table('clientes')->get();

		//$clientes = DB::table('clientes')->get()->paginate(5);
		
		//return $clientes;
	    return view('clientes.VistaClientes', ['ListaClientes' => $clientes], ['busqueda' => $busqueda]);
	}

	public function getDetalleClientes(Request $request, $id)
	{


		$ListaClientes = DB::table('clientes')->where('id', $id)->get();

		//$ventas = DB::table('ventas')->where('id_cliente', $id)->get();
		$ListaVentas = ventas::search($request->busqueda, $id)->paginate(3);
		$busqueda = $request->get("busqueda");
		$ListaVentas->appends(['busqueda' => $busqueda])->links();

	    return view('clientes.DetalleClientes', compact('ListaClientes', 'ListaVentas', 'busqueda'));
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
		
		$clientes = DB::table('clientes')->paginate(4);
		$busqueda = $request->get("busqueda");
		$clientes->appends(['busqueda' => $busqueda])->links();
		
		return view('clientes.VistaClientes', ['ListaClientes' => $clientes], ['busqueda' => $busqueda]);
	}
	public function guardarDatosEditadosCliente(ClienteEditarRequest $request, $id){

		$editar_cliente = Cliente::where('id', $id)->first();

		$editar_cliente->update($request->all());

		return $this->getDetalleClientes($request, $id);
	}
}
