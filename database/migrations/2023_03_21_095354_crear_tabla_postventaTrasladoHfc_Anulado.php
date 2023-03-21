<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoHfcAnulado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoHfc_Anulada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadTrasladoHfc');
            $table->integer('OrdenTvAnulTraslHfc')->nullable();
            $table->integer('OrdenInterAnulTraslHfc')->nullable();
            $table->integer('OrdenLineaAnulTraslHfc')->nullable();
            $table->string('MotivoAnuladaTraslado_Hfc');
            $table->string('TrabajadoAnuladaTraslado_Hfc');
            $table->string('ComenAnuladaTraslado_Hfc');
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
        Schema::dropIfExists('postventaTrasladoHfc_Anulada'); 
    }
}