<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneCobreRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesCobre_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionCobre');
            $table->integer('CodigoCausaCobre');
            $table->integer('CodigoTipoDañoCobre');
            $table->integer('CodigoUbicacionDañoCobre');
            $table->string('DescripcionCausaCobre');
            $table->string('DescripcionTipoDañoCobre');
            $table->string('DescripcionUbicacionDañoCobre');
            $table->integer('OrdenReparacionCobre');
            $table->integer('syrengReparacionCobre');
            $table->string('ObservacionesCobre');
            $table->string('RecibeCobre');
            $table->string('TrabajadoCobre');
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
        Schema::dropIfExists('reparacionesCobre_Realizado'); 
    }
}