<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoGponObjetado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoGpon_Objetado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadTrasladoGpon');
            $table->integer('OrdenTvTrasladoObjGpon')->nullable();
            $table->integer('OrdenInterObjTraslGpon')->nullable();
            $table->integer('OrdenLineaTraslObjGpon')->nullable();
            $table->string('MotivoObjTrasladoGpon');
            $table->string('TrabajadoTrasladoObjGpon');
            $table->string('ObvsTrasladoObjGpon');
            $table->string('ComentTrasladoObjGpon');
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
        Schema::dropIfExists('postventaTrasladoGpon_Objetado'); 
    }
}