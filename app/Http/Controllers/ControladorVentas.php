<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ventas;
use App\documento;

class ControladorVentas extends Controller
{
    public function getDetalleVenta($id)
	{
		$ventas = DB::table('ventas')->where('id', $id)->get();
		$documentos = DB::table('documentos')->where('id_venta', $id)->get();

	    return view('clientes.DetalleVentas', ['ListaVentas' => $ventas], ['ListaDocumentos' => $documentos]);
	}

	public function nuevaVenta(Request $request, $id)
	{

		$venta = new ventas;
		$venta->id_cliente = $id;
		$venta->descripcion = $request->input('descripcion');
		$venta->estado = $request->input('estado');
		$venta->save();

		$cc = new ControladorClientes();
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
		$date =  date( "Y-m-d_H:i:s", time());
		$tipo_documento = $request->input('tipo_de_documento');
		$nombre_del_documento = $request->input('nombre_del_documento');

		$documento = new documento;
        $documento->id_venta = $id;
        $documento->tipo_documento = $tipo_documento;
        $documento->archivo = $request->file('documento')->storeAs('public',$nombre_del_documento ."_". $tipo_documento ."_". $date.".pdf");
        $documento->save();

		return $this->getDetalleVenta($id);

	}
}
