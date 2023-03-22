<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoGponAnulado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoGpon_Anulado', function (Blueprint $table) {
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
            $table->integer('OrdenTvTraslAnuladoGpon')->nullable();
            $table->integer('OrdenIntTrasladoAnulGpon')->nullable();
            $table->integer('OrdenLineaTraslAnulGpon')->nullable();
            $table->string('MotivoTrasladoAnulada_Gpon');
            $table->string('TrabajadoAnuladaTraslado_gpon');
            $table->string('ComentarioTrasladoAnulada_Gpon');
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
        Schema::dropIfExists('postventaTrasladoGpon_Anulado'); 
    }
}