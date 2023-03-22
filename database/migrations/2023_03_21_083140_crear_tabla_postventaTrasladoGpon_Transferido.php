<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoGponTransferido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoGpon_Transferido', function (Blueprint $table) {
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
            $table->integer('OrdenTvTrasladoTransGpon')->nullable();
            $table->integer('OrdenIntTransladoGpon')->nullable();
            $table->integer('OrdenLineaTrasladoTransGpon')->nullable();
            $table->string('MotivoTransTrasladoGpon');
            $table->string('TrabajadoTraslTransGpon');
            $table->string('ComentTrasladoTransGpon');
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
        Schema::dropIfExists('postventaTrasladoGpon_Transferido'); 
    }
}