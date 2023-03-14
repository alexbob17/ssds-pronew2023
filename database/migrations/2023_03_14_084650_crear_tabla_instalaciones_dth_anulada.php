<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInstalacionesDthAnulada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacioncobre_anulada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_tecnico');
            $table->string('telefono');
            $table->string('tecnico');
            $table->string('motivo_llamada');
            $table->string('select_orden');
            $table->string('dpto_colonia');
            $table->string('tipo_actividadDth');
            $table->string('MotivoAnulada_Cobre');
            $table->integer('OrdenAnuladaCobre');
            $table->string('TrabajadoAnulada_Cobre');
            $table->string('ComentarioAnulada_Cobre');
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
        Schema::dropIfExists('instalacioncobre_anulada');
    }
}