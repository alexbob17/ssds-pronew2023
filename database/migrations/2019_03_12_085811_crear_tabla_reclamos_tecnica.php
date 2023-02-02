<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReclamosTecnica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos_tecnica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_tecnico');
            $table->string('codigo_tecnico');
            $table->string('nombre_tecnico');
            $table->string('tecnologia');
            $table->integer('id_producto', false, true);
            $table->integer('id_solicitud', false, true);
            $table->string('lider_tecnica');
            $table->string('causa_reclamo');
            $table->text('observaciones');
            $table->text('resolucion_tecnica')->nullable();
            $table->string('estado');
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
        Schema::drop('reclamos_tecnica');
    }
}
