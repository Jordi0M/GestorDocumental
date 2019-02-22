<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('documento');
            $table->string('direccion');
            $table->string('provincia')->nullable();
            $table->string('localidad')->nullable();
            $table->integer('cp');
            $table->integer('telefono')->unsigned();
            $table->string('mail');
            $table->date('fecha_modificacion');
            $table->timestamps();
        });

        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente')->unsigned();
            $table->date('fecha_venta');
            $table->timestamps();

            //foraneas
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->string('tipo_documento');
            $table->string('archivo');
            $table->timestamps();

            //foraneas
            $table->foreign('id_venta')->references('id')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
