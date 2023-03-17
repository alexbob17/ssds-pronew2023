<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaRetiroHfcObjetada extends Model
{
    protected $table = 'postventaRetiroHfc_Objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReconexionHfc',
	    'MotivoObjRetiroHfc',
		'OrdenRetiroObjHfc',
	    'TrabajadoObjRetiroHfc',
		'ObvsObjRetiroHfc',
	    'ComentariosRetiroObjHfc',
        'username_creacion',
		'username_atencion',
    ];
}