<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneGponObjetado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesGpon_Objetado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionGpon');
            $table->string('MotivoObjetada_Gpon');
            $table->integer('OrdenObjGpon');
            $table->string('TrabajadoObjetadaGpon');
            $table->string('ComentariosObjGpon');
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
        Schema::dropIfExists('reparacionesGpon_Objetado'); 
    }
}