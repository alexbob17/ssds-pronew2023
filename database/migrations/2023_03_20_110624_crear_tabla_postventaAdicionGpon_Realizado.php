<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaAdicionGponRealizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaAdicionGpon_Realizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadAdicionGpon');
            $table->string('equipostvAdicionGpon1')->nullable();
            $table->string('equipostvAdicionGpon2')->nullable();
            $table->string('equipostvAdicionGpon3')->nullable();
            $table->string('equipostvAdicionGpon4')->nullable();
            $table->string('equipostvAdicionGpon5')->nullable();
            $table->integer('NOrdenAdicionGpon');
            $table->string('TrabajadoAdicionGpon');
            $table->string('ObvsAdicionGpon');
            $table->string('RecibeAdicionGpon');
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
        Schema::dropIfExists('postventaAdicionGpon_Realizada');
        
    }
}