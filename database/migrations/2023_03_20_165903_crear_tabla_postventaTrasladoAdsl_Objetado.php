<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoAdslObjetado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoAdsl_Objetada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadTrasladoAdsl');
            $table->string('MotivoObjTrasladoAdsl');
            $table->integer('OrdenObjTrasladoAdsl');
            $table->string('TrabajadoTrasladoObjAdsl');
            $table->string('ObvsTrasladoObjAdsl');
            $table->string('ComentariosTrasladosObjAdsl');
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
        Schema::dropIfExists('postventaTrasladoAdsl_Objetada'); 
    }
}