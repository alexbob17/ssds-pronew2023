<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaNodosSaturados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodos_saturados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_cliente');
            $table->string('no_contrato');
            $table->string('ubicacion_geografica');
            $table->string('barrio');
            $table->string('direccion');
            $table->string('codigo_dano');
            $table->date('fecha_registro_dano');
            $table->string('nodo_saturado');
            $table->string('nomenclatura_nodo');
            $table->string('estado_gestion');
            $table->date('fecha_fin_afectacion')->nullable();
            $table->text('comentarios')->nullable();
            $table->string('estado');
            $table->integer('dias_dilacion', false, true)->nullable();
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
        Schema::drop('nodos_saturados');
    }
}
