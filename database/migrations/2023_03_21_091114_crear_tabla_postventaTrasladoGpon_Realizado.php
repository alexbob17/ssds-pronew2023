<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoGponRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoGpon_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadTrasladoGpon');
            $table->integer('OrdenTvTrasladoGpon')->nullable();
            $table->integer('OrdenInternetTrasladoGpon')->nullable();
            $table->integer('OrdenLineaTrasladoGpon')->nullable();
            $table->string('ObvsTrasladoGpon');
            $table->string('TrabajadoTrasladoGpon');
            $table->string('RecibeTrasladoGpon');
            $table->string('NodoTrasladoGpon');
            $table->string('TapTrasladoGpon');
            $table->string('PosicionTrasladoGpon');
            $table->string('MaterialesTrasladoGpon');
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
        Schema::dropIfExists('postventaTrasladoGpon_Realizado'); 
    }
}