<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instalacionhfc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacionhfc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->integer('telefono');
            $table->string('motivo_llamada');
            $table->string('tecnico');
            $table->string('tecnologia');
            $table->string('tipo_orden');
            $table->string('orden_tv');
            $table->string('orden_internet');
            $table->string('orden_linea');
            $table->string('motivo_actividad');
            $table->integer('syreng');
            $table->string('sap');
            $table->string('equipos_tv1')->nullable();
            $table->string('equipos_tv2')->nullable();
            $table->string('equipos_tv3')->nullable();
            $table->string('equipos_tv4')->nullable();
            $table->string('equipos_tv5')->nullable();
            $table->string('equipo_modem');
            $table->string('numero_voip');
            $table->string('georeferencia');
            $table->string('observaciones');
            $table->string('recibe');
            $table->string('nodo')->nullable();
            $table->string('tap')->nullable();
            $table->string('posicion')->nullable();
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
        Schema::drop('instalacionhfc');
    }
}