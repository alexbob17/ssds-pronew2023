<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaQflows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qflows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_caso_qflow');
            $table->date('fecha_registro');
            $table->date('fecha_recibido');
            $table->string('tipo_servicio');
            $table->string('no_producto');
            $table->string('nombre_cliente');
            $table->string('tipologia');
            $table->string('estado');
            $table->string('no_dano_solicitud')->nullable();
            $table->string('causal_cierre_open')->nullable();
            $table->string('causal_correcta')->nullable();
            $table->integer('dias_dilacion', false, true)->nullable();
            $table->text('observaciones');
            $table->date('fecha_creacion');
            $table->date('fecha_atencion')->nullable();
            $table->integer('periodo_creacion', false, true);
            $table->integer('periodo_atencion', false, true)->nullable();
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
        Schema::drop('qflows');
    }
}
