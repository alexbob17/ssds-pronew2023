<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneHfcRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesHfc_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionHfc');
            $table->integer('CodigoCausaHfc');
            $table->integer('CodigoTipoDañoHfc');
            $table->integer('CodigoUbicacionDañoHfc');
            $table->string('DescripcionCausaDañoHfc');
            $table->string('DescripcionTipoDañoHfc');
            $table->string('DescripcionUbicacionHfc');
            $table->integer('OrdenHfc');
            $table->integer('syrengHfc');
            $table->string('ObservacionesHfc');
            $table->string('RecibeHfc');
            $table->string('TrabajadoHfcRealizado');
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
        Schema::dropIfExists('reparacionesHfc_Realizado'); 
    }

}