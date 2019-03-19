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

        $nombres = array(
            0 => 'Victor',
            1 => 'Aaron',
            2 => 'Samuel',
            3 => 'Aitor',
            4 => 'Hugo',
            5 => 'Eduardo',
        );

        $cp = array(
            0 => '08231',
            1 => '08960',
            2 => '08332',
            3 => '08196',
            4 => '08541',
            5 => '08657',
        );

        $telefonos = array(
            0 => '932713658',
            1 => '932208483',
            2 => '932204086',
            3 => '932711185',
            4 => '932712924',
            5 => '932712921',
        );

        $nif = array(
            0 => '55429536L',
            1 => '73812205F',
            2 => '77832482E',
            3 => '63508986Y',
            4 => '89447918K',
            5 => '20328169X',
            6 => '99938627Q',
            7 => '55562783G',
            8 => '47612498Z',
            9 => '52158494Z',
        );

        $mails = array(
            1 => 'merk@gmail.com',
            2 => 'alboc@outlook.com',
            3 => 'mlg@gmail.es',
            4 => 'ppxt@yahoo.es',
            5 => 'bbc@yahoo.com',
            6 => 'sav@gmail.com',
            7 => 'gfdf@outlook.com',
            8 => 'qert@gmail.es',
            9 => 'astor@outlook.es',
        );

        $calles = array(
            0 => 'Calle de Alcalá',
            1 => 'Calle de Balmes',
            2 => 'Ronda de San Pedro',
            3 => 'Calle de Muntaner',
            4 => 'Avenida de Sarriá',
            5 => 'Calle de Sants',
        );

        for ($i=1; $i<10; $i++){

            $rand_localidades = rand(0,5);
            $localidad_escogida = $localidades[$rand_localidades];

            $rand_nombres = rand(0,5);
            $nombre_escogido = $nombres[$rand_nombres];

            $rand_cp = rand(0,5);
            $cp_escogido = $cp[$rand_cp];

            $rand_telefono = rand(0,5);
            $telefono_escogido = $telefonos[$rand_telefono];

            $rand_calle = rand(0,5);
            $calle_escogida = $calles[$rand_calle];

            Cliente::create([
                'nombre' 		=>	$nombre_escogido,
                'documento'	=>	    $nif[$i],
                'direccion'		=>	$calle_escogida,
                'provincia'		=>	'Barcelona' . $i,
                'localidad'		=>	$localidad_escogida,
                'cp'		=>	    $cp_escogido,
                'telefono'		=>	$telefono_escogido,
                'mail'		=>      $mails[$i]
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
                'descripcion'   =>  'Ejemplo ' . $i,
                'estado'    =>      $estado_final
            ]);
        }
    }
}
