<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesGponObjetada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('instalaciongpon_objetada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('tipo_actividadGpon');
            $table->integer('OrdenInternet_Gpon')->nullable();
            $table->integer('OrdenTv_Gpon')->nullable();
            $table->integer('OrdenLinea_Gpon')->nullable();
            $table->string('MotivoObjetado_Gpon');
            $table->string('TrabajadoGpon_Objetado');
            $table->string('ObsGpon_Objetada');
            $table->string('ComentariosGpon_Objetada');
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
        Schema::dropIfExists('instalaciongpon_objetada');

    }
}