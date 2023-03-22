<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaAdicionDthRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaAdicionDth_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadAdicionDth');
            $table->string('equipostvAdicionDth1')->nullable();
            $table->string('equipostvAdicionDth2')->nullable();
            $table->string('equipostvAdicionDth3')->nullable();
            $table->string('equipostvAdicionDth4')->nullable();
            $table->string('equipostvAdicionDth5')->nullable();
            $table->integer('NOrdenAdicionDth');
            $table->string('TrabajadoAdicionDth');
            $table->string('ObvsAdicionDth');
            $table->string('RecibeAdicionDth');
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
        Schema::dropIfExists('postventaAdicionDth_Realizado');
        
    }
}