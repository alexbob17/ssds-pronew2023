<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaMigracionTransferida extends Model
{
    protected $table = 'postventaMigracion_Transferida';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadMigracionHfc',
	    'OrdenMigracionTranfHfc',
		'TrabajadoMigracionTransHfc',
	    'MotivoTransMigracionHfc',
		'ComentsMigracionTransHfc',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];

}