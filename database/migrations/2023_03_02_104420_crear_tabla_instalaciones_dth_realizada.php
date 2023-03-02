<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesDthRealizada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalaciondth_realizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tipo_actividadDth');
            $table->integer('ordenTv_Dth');
            $table->integer('SyrengDth');
            $table->string('GeoreferenciaDth');
            $table->string('sap_dth');
            $table->string('TrabajadoDth');
            $table->integer('SmarcardDth1')->nullable();
            $table->integer('SmarcardDth2')->nullable();
            $table->integer('SmarcardDth3')->nullable();
            $table->integer('SmarcardDth4')->nullable();
            $table->integer('SmarcardDth5')->nullable();
            $table->integer('StbDth1')->nullable();
            $table->integer('StbDth2')->nullable();
            $table->integer('StbDth3')->nullable();
            $table->integer('StbDth4')->nullable();
            $table->integer('StbDth5')->nullable();
            $table->string('ObservacionesDth');
            $table->string('RecibeDth');
            $table->string('MaterialesDth');
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
        //
    }
}