<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReparacioneAdslRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacionesAdsl_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('tecnologia');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadReparacionAdsl');
            $table->integer('CodigoCausaAdsl');
            $table->integer('CodigoTipoDañoAdsl');
            $table->integer('CodigoUbicacionDañoAdsl');
            $table->string('DescripcionCausaAdsl');
            $table->string('DescripcionTipoDañoAdsl');
            $table->string('DescripcionUbicacionDañoAdsl');
            $table->integer('OrdenAdslRealizado');
            $table->integer('syrengAdsl');
            $table->string('ObservacionesAdsl');
            $table->string('RecibeAdsl');
            $table->string('TrabajadoAdsl');
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
        Schema::dropIfExists('reparacionesAdsl_Realizado'); 
    }

}