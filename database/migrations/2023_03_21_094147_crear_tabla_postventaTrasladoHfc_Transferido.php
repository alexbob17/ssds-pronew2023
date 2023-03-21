<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoHfcTransferido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoHfc_Transferido', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadTrasladoHfc');
            $table->integer('OrdenTvTransferidoHfc')->nullable();
            $table->integer('OrdenInternetTransferidoHfc')->nullable();
            $table->integer('OrdenLineaTransferidoHfc')->nullable();
            $table->string('MotivoTransTrasladoHfc');
            $table->string('TrabajadoTransTrasladoHfc');
            $table->string('ComentarioTrasladoTransHfc');
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
        Schema::dropIfExists('postventaTrasladoHfc_Transferido'); 
    }
}