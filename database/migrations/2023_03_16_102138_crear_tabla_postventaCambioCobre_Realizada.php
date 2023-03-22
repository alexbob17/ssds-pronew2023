<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPostventaCambioCobreRealizada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postventaCambioCobre_Realizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('Select_Postventa');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('TipoActividadCambioNumeroCobre');
            $table->integer('NumeroCobreCambio');
            $table->integer('OrdenCambioCobre');
            $table->string('TrabajadoCambioCobre');
            $table->string('ObvsCambioCobre');
            $table->string('RecibeCambioCobre');
            $table->string('username_creacion')->references('username')->on('users');
            $table->string('username_atencion')->references('username')->on('users')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postventaCambioCobre_Realizada');
    }
}