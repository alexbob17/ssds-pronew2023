<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaTrasladoCobreRealizada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaTrasladoCobre_Realizado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadTrasladoCobre');
            $table->integer('OrdenTrasladoCobre');
            $table->string('GeorefTrasladoCobre');
            $table->string('MaterialesTrasladoCobre');
            $table->string('TrabajadoTrasladoCobre');
            $table->string('ObvsTrasladoCobre');
            $table->string('RecibeTrasladoCobre');
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
        Schema::dropIfExists('postventaTrasladoCobre_Realizado'); 
    }
}