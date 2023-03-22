<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesHfcRealizada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacionhfc_realizada', function (Blueprint $table) {
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
            $table->string('equipostv1')->nullable();
            $table->string('equipostv2')->nullable();
            $table->string('equipostv3')->nullable();
            $table->string('equipostv4')->nullable();
            $table->string('equipostv5')->nullable();
            $table->integer('syrengHfc');
            $table->string('sapHfc')->nullable();;
            $table->string('EquipoModem_Hfc')->nullable();
            $table->integer('numeroVoip_hfc')->nullable();
            $table->string('GeorefHfc');
            $table->string('TrabajadoHfc');
            $table->string('ObservacionesHfc');
            $table->string('RecibeHfc');
            $table->string('NodoHfc');
            $table->string('TapHfc');
            $table->string('PosicionHfc');
            $table->string('MaterialesHfc');
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
        Schema::dropIfExists('instalacionhfc_realizada');
    }
}