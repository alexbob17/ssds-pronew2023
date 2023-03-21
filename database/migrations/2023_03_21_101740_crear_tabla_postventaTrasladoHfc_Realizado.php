<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoHfcRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoHfc_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadTrasladoHfc');
            $table->integer('OrdenTvTrasladoHfc')->nullable();
            $table->integer('OrdenInternetTrasladoHfc')->nullable();
            $table->integer('OrdenLineaTrasladoHfc')->nullable();
            $table->string('ObservacionesTrasladoHfc');
            $table->string('TrabajadoTrasladoHfc');
            $table->string('RecibeHfcRealizado');
            $table->string('NodoTrasladoHfc');
            $table->string('TapTrasladoHfc');
            $table->string('PosicionTrasladoHfc');
            $table->string('MaterialesTrasladoHfc');
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
        Schema::dropIfExists('postventaTrasladoHfc_Realizado'); 
    }
}