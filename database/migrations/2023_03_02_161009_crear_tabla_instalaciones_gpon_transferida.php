<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesGponTransferida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalaciongpon_transferida', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tipo_actividadGpon');
            $table->integer('OrdenInternet_Gpon');
            $table->integer('OrdenTv_Gpon');
            $table->integer('OrdenLinea_Gpon');
            $table->string('MotivoTransferidoGpon');
            $table->string('TrabajadoTransferido_Gpon');
            $table->string('ComentarioTransferido_Gpon');
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
        Schema::dropIfExists('instalaciongpon_transferida');

    }
}