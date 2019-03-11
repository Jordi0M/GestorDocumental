<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<20; $i++){
            Cliente::create([
                'nombre' 		=>	'Cliente ' . $i,
                'documento'	=>	'A12345 ' . $i,
                'direccion'		=>	'Cornella' . $i,
                'provincia'		=>	'Barcelona' . $i,
                'localidad'		=>	'Barcelona' . $i,
                'cp'		=>	'555' . $i,
                'telefono'		=>	'9325147' . $i,
                'mail'		=>	'cliente' . $i.'@proyecto.com'
            ]);
        }
    }
}
