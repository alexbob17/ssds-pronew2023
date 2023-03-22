<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesRealizadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacionadsl_realizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('tipo_actividadAdsl');
            $table->integer('orden_internet_adsl');
            $table->string('Georeferencia_Adsl');
            $table->string('TrabajadoAdsl');
            $table->string('Obvservaciones_Adsl');
            $table->string('Recibe_Adsl');
            $table->string('Materiales_Adsl');
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
        Schema::drop('instalacionadsl_realizada');
        
    }
}