<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaAdicionDthObjetado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaAdicionDth_Objetado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadAdicionDth');
            $table->string('MotivoObjAdicionDth');
            $table->integer('NOrdenAdicionObjDth');
            $table->string('TrabajadoAdicionObjDth');
            $table->string('ObvsAdicionObjDth');
            $table->string('ComentariosAdicionObjDth');
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
        Schema::dropIfExists('postventaAdicionDth_Objetado');
        
    }
}