<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesHfcTransferida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('instalacionhfc_transferida', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tecnologia');
            $table->string('tipo_actividad');
            $table->integer('orden_tv_hfc')->nullable();
            $table->integer('orden_internet_hfc')->nullable();
            $table->integer('orden_linea_hfc')->nullable();
            $table->string('TrabajadoTransferido_Hfc');
            $table->string('MotivoTransferidoHfc');
            $table->string('ComentariosTransferida_Hfc');
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
        Schema::dropIfExists('instalacionhfc_transferida');
    }
}