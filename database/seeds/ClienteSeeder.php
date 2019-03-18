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
        $localidades = array(
            0 => 'Granollers',
            1 => 'Hospitalet',
            2 => 'Rubi',
            3 => 'Barcelona',
            4 => 'Sant Boi',
            5 => 'Manresa',
        );

        for ($i=1; $i<10; $i++){

            $estado = rand(0,5);
            $localidad_escogida = $localidades[$estado];

            Cliente::create([
                'nombre' 		=>	'Cliente ' . $i,
                'documento'	=>	$i . '2345678A',
                'direccion'		=>	'Cornella' . $i,
                'provincia'		=>	'Barcelona' . $i,
                'localidad'		=>	$localidad_escogida,
                'cp'		=>	'5555' . $i,
                'telefono'		=>	'93251478' . $i,
                'mail'		=>	'cliente' . $i.'@proyecto.com'
            ]);
        }

        for ($i=1; $i<20; $i++){
            $id_cliente = rand(1,9);
            $estado = rand(0,1);

            if ($estado == 0) {
                    $estado_final = "sin vender";
                }
            elseif ($estado == 1) {
                    $estado_final    = "vendido";
                }

            ventas::create([
                'id_cliente'    =>  $id_cliente,
                'descripcion'   =>     'Ejemplo ' . $i,
                'estado'    =>  $estado_final
            ]);
        }
    }
}
