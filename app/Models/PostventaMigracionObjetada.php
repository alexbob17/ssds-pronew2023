<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaMigracionObjetada extends Model
{
    protected $table = 'postventaMigracion_Objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadMigracionHfc',
	    'MotivoMigracionObjHfc',
		'OrdenMigracionHfcObj',
	    'TrabajadoMigracionObjHfc',
		'ObvsMigracionObjHfc',
        'username_creacion',
		'username_atencion',
    ];
}