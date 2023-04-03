<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneGponRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesGpon_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionGpon');
            $table->integer('CodigoCausaGpon');
            $table->integer('CodigoTipoDañoGpon');
            $table->integer('CodigoUbicacionDañoGpon');
            $table->string('DescripcionCausaDañoGpon');
            $table->string('DescripcionTipoDañoGpon');
            $table->string('DescripcionUbicacionGpon');
            $table->integer('OrdenRealizadoGpon');
            $table->integer('syrengGpon');
            $table->string('ObservacionesGpon');
            $table->string('RecibeGpon');
            $table->string('TrabajadoGpon');
            $table->string('username_creacion')->references('username')->on('users');
            $table->string('username_atencion')->references('username')->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparacionesGpon_Realizado'); 
    }

}