<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instalacionadsl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacion_adsl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->integer('telefono');
            $table->string('motivo_llamada');
            $table->string('tecnico');
            $table->string('tecnologia');
            $table->string('tipo_orden');
            $table->string('orden_internet');
            $table->string('tipo_actividad');
            $table->string('sap');
            $table->string('observaciones')->nullable();;
            $table->string('recibe')->nullable();;
            $table->string('materiales')->nullable();
            $table->boolean('trabajado');
            $table->date('fecha_creacion');
            $table->date('fecha_atencion')->nullable();
            $table->integer('periodo_creacion', false, true);
            $table->integer('periodo_atencion', false, true)->nullable();
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
        Schema::drop('instalacion_adsl');

    }
}