<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInconsistencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inconsistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_incidente');
            $table->string('tipo_servicio');
            $table->string('tipo_inconsistencia');
            $table->date('fecha_incidente');
            $table->date('fecha_atencion');
            $table->integer('periodo', false, true);
            $table->string('username')->references('username')->on('users');
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
        Schema::drop('inconsistencias');
    }
}
