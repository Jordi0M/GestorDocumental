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
            $table->increments('id')->unique();
            $table->string('nombre');
            $table->string('documento',10);
            $table->string('direccion');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('cp',5);
            $table->integer('telefono')->unsigned();
            $table->string('mail');
            $table->timestamps();
        });

        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('id_cliente')->unsigned();
            $table->string('descripcion');
            $table->boolean('estado');
            $table->timestamps();

            //foraneas
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('id_venta')->unsigned();
            $table->string('tipo_documento');
            $table->string('archivo');
            $table->string('nombre_inicial');
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
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('clientes');
    }
}
