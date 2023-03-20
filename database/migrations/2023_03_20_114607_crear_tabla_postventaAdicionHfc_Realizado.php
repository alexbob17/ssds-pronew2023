<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaAdicionHfcRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaAdicionHfc_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('TipoActividadAdicionHfc');
            $table->string('equipostvAdicionHfc1')->nullable();
            $table->string('equipostvAdicionHfc2')->nullable();
            $table->string('equipostvAdicionHfc3')->nullable();
            $table->string('equipostvAdicionHfc4')->nullable();
            $table->string('equipostvAdicionHfc5')->nullable();
            $table->integer('NOrdenAdicionHfc');
            $table->string('TrabajadoAdicionHfc');
            $table->string('obvsAdicionHfc');
            $table->string('RecibeAdicionHfc');
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
        Schema::dropIfExists('postventaAdicionHfc_Realizado');
        
    }
}