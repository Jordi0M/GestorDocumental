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

		$editar_venta = ventas::where('id', $id)->first();

		//$editar_venta->update($request->all());

		if ($request->input('estado') == "sin vender") {
			$estado = 0;
		}
		elseif ($request->input('estado') == "vendido") {
			$estado = 1;
		}

		return $request;

		//return $this->getDetalleVenta($id);
	}
}
