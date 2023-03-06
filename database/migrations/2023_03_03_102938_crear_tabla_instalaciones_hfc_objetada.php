<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesHfcObjetada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacionhfc_objetada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tipo_actividad');
            $table->integer('orden_tv_hfc')->nullable();
            $table->integer('orden_internet_hfc')->nullable();
            $table->integer('orden_linea_hfc')->nullable();
            $table->string('MotivoObjetada_Hfc');
            $table->string('TrabajadoObjetadaHfc');
            $table->string('ComentariosObjetados_Hfc');
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
        Schema::dropIfExists('instalacionhfc_objetada');

    }
}