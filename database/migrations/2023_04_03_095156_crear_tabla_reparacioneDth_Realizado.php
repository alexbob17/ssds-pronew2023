<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneDthRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesDth_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionDth');
            $table->integer('CodigoCausaDth');
            $table->integer('CodigoTipoDañoDth');
            $table->integer('CodigoUbicacionDañoDth');
            $table->string('DescripcionCausaDth');
            $table->string('DescripcionTipoDañoDth');
            $table->string('DescripcionUbicacionDañoDth');
            $table->integer('OrdenDthRealizada');
            $table->integer('syrengDthRealizado');
            $table->string('ObservacionesDth');
            $table->string('RecibeDth');
            $table->string('TrabajadoDth');
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
        Schema::dropIfExists('reparacionesDth_Realizado'); 
    }
}