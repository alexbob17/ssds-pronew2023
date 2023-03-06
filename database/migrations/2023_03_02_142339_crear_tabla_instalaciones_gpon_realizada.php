<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesGponRealizada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalaciongpon_realizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->integer('OrdenInternet_Gpon')->nullable();
            $table->integer('OrdenTv_Gpon')->nullable();;
            $table->integer('OrdenLinea_Gpon')->nullable();;
            $table->string('tipo_actividadGpon');
            $table->string('equipotv1Gpon')->nullable();;
            $table->string('equipotv2Gpon')->nullable();;
            $table->string('equipostv3Gpon')->nullable();;
            $table->string('equipostv4Gpon')->nullable();;
            $table->string('equipostv5Gpon')->nullable();;
            $table->string('EqModenGpon')->nullable();;
            $table->string('GeoreferenciaGpon');
            $table->string('SapGpon');
            $table->integer('NumeroGpon')->nullable();;
            $table->string('TrabajadoGpon');
            $table->string('ObservacionesGpon');
            $table->string('RecibeGpon');
            $table->string('NodoGpon');
            $table->integer('CajaGpon');
            $table->integer('PuertoGpon');
            $table->string('MaterialesRedGpon');
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
    
        Schema::dropIfExists('instalaciongpon_realizada');

    }
}