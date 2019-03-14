<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ventas;
use App\documento;
use App\Http\Requests\VentaNuevaRequest;

class ControladorVentas extends Controller
{
    public function getDetalleVenta($id,$id_cliente)
	{	
		//el cliente es para dar el nombre del cliente en el detalle de la venta
		$ListaCliente = DB::table('clientes')->where('id', $id_cliente)->get();
		$ListaVentas = DB::table('ventas')->where('id', $id)->get();
		$ListaDocumentos = DB::table('documentos')->where('id_venta', $id)->get();

	    return view('clientes.DetalleVentas', compact('ListaCliente', 'ListaVentas', 'ListaDocumentos'));
	}

	public function nuevaVenta(VentaNuevaRequest $request, $id)
	{

		$venta = new ventas;
		$venta->id_cliente = $id;
		$venta->descripcion = $request->input('descripcion');
		$venta->estado = $request->input('estado');
		$venta->save();

		$cc = new ControladorClientes();
		return $cc->getDetalleClientes($id);
		
	}

	public function guardarDatosEditadosVenta(VentaNuevaRequest $request, $id, $id_cliente){

        $editar_venta = ventas::find($id);
        $editar_venta->descripcion = $request->input('descripcion');
        $editar_venta->estado = $request->input('estado');
        $editar_venta->save();

		return $this->getDetalleVenta($id, $id_cliente);
	}

	public function SubirFichero(Request $request, $id, $id_cliente)
	{	
		$date =  date( "Y-m-d_H-i-s", time());
		$tipo_documento = $request->input('tipo_de_documento');
		$nombre_del_documento = $request->input('nombre_del_documento');

		$documento = new documento;
        $documento->id_venta = $id;
        $documento->tipo_documento = $tipo_documento;
        $documento->archivo = $request->file('documento')->storeAs('public',$nombre_del_documento ."_". $tipo_documento ."_".$date.".pdf");
        $documento->save();

		return $this->getDetalleVenta($id, $id_cliente);

	}
}
