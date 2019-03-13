<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\ventas;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<10; $i++){
            Cliente::create([
                'nombre' 		=>	'Cliente ' . $i,
                'documento'	=>	$i . '2345678A',
                'direccion'		=>	'Cornella' . $i,
                'provincia'		=>	'Barcelona' . $i,
                'localidad'		=>	'Barcelona' . $i,
                'cp'		=>	'5555' . $i,
                'telefono'		=>	'93251478' . $i,
                'mail'		=>	'cliente' . $i.'@proyecto.com'
            ]);
        }

        for ($i=1; $i<20; $i++){
            $id_cliente = rand(1,9);
            $estado = rand(0,1);
            ventas::create([
                'id_cliente'    =>  $id_cliente,
                'descripcion'   =>     'Ejemplo ' . $i,
                'estado'     =>  $estado
            ]);
        }
    }
}
