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
            $table->string('tipo_orden');
            $table->string('dpto_colonia');
            $table->string('tipo_actividadAdsl');
            $table->string('orden_internetadsl');
            $table->string('GeoRefAdsl');
            $table->string('trabajado_adsl');
            $table->string('obv_adsl');
            $table->string('Recibe_adsl');
            $table->string('materialeAdsl');
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
        Schema::dropIfExists('instalacionadsl_realizada');
        
    }

}