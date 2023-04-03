<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneCobreTransferido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesCobre_Transferido', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionCobre');
            $table->integer('OrdenTransfCobre');
            $table->string('ObvsCobreTransferido');
            $table->string('ComentarioCobreTransferido');
            $table->string('TrabajadoCobreTransferido');
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
        Schema::dropIfExists('reparacionesCobre_Transferido'); 
    }
}