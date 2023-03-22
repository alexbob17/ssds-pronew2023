<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaMigracionHfcRealizada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaMigracion_Realizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadMigracionHfc');
            $table->string('equipotvmigracion1')->nullable();
            $table->string('equipotvmigracion2')->nullable();
            $table->string('equipotvmigracion3')->nullable();
            $table->string('equipotvmigracion4')->nullable();
            $table->string('equipotvmigracion5')->nullable();
            $table->integer('NOrdenMigracionHfc');
            $table->integer('SyrengMigracionHfc');
            $table->string('SapMigracionHfc');
            $table->string('ObvsMigracionHfc');
            $table->string('TrabajadoMigracionHfc');
            $table->string('RecibeMigracionHfc');
            $table->string('NodoMigracionHfc');
            $table->integer('PosicionMigracionHfc');
            $table->integer('TapMigracionRealizadaHfc');
            $table->string('GeorefMigracionHfc');
            $table->string('MaterialesMigracionHfc');
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
        Schema::dropIfExists('postventaMigracion_Realizada');
        
    }
}