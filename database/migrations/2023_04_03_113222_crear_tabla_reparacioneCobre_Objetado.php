<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneCobreObjetado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesCobre_Objetado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionCobre');
            $table->string('MotivoObjetada_Cobre');
            $table->integer('OrdenObjReparacionCobre');
            $table->string('TrabajadoObjetadaCobre');
            $table->string('ComentariosObjetados_Cobre');
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
        Schema::dropIfExists('reparacionesCobre_Objetado'); 
    }
}