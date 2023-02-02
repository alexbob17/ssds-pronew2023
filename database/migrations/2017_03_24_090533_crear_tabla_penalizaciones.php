<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPenalizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_reporte');
            $table->string('nivel');
            $table->string('nombre_agente');
            $table->string('aplicativo');
            $table->string('falta_cometida');
            $table->text('descripcion');
            $table->date('fecha_atencion');
            $table->integer('periodo', false, true);
            $table->string('username')->references('username')->on('users');
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
        Schema::drop('penalizaciones');
    }
}
