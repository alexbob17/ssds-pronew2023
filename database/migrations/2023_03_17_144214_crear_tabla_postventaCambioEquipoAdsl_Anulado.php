<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaCambioEquipoAdslAnulado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaCambioEquipoAdsl_Anulada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadCambioAdsl');
            $table->string('MotivoEquipoAnulada_Adsl');
            $table->integer('OrdenAnuladaEquipoAdsl');
            $table->string('TrabajadoEquipoAnulada_Adsl');
            $table->string('ComentsEquipoAnulada_Adsl');
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
        Schema::dropIfExists('postventaCambioEquipoAdsl_Anulada');
        
    }
}