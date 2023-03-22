<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaCambioEquipoHfcRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaCambioEquipoHfc_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadCambioHfc');
            $table->string('InstalacionEquipoHfc');
            $table->string('DesinstalarEquipoHfc');
            $table->integer('NOrdenEquipoHfc');
            $table->string('ObvsEquipoHfc');
            $table->string('RecibeEquipoHfc');
            $table->string('TrabajadoEquipoHfc');
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
        Schema::dropIfExists('postventaCambioEquipoHfc_Realizado');
        
    }
}