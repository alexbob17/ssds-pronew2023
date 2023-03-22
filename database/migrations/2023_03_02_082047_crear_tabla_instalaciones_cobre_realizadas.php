<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesCobreRealizadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacioncobre_realizada', function (Blueprint $table) {
            $table->increments("id");
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('tipo_actividadCobre');
            $table->integer('OrdenLineaCobre');
            $table->integer('NumeroCobre');
            $table->string('GeoreferenciaCobre');
            $table->string('sap_cobre');
            $table->string('TrabajadoCobre');
            $table->string('ObservacionesCobre');
            $table->string('RecibeCobre');
            $table->string('MaterialesCobre');
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
        Schema::dropIfExists('instalacioncobre_realizada');

    }
}