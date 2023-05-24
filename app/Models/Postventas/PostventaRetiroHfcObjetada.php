<?php

namespace SSD\Models\Postventas;

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
        'tecnologia',
        'TipoActividadReconexionHfc',
	    'MotivoObjRetiroHfc',
		'OrdenRetiroObjHfc',
	    'TrabajadoObjRetiroHfc',
		'ObvsObjRetiroHfc',
	    'ComentariosRetiroObjHfc',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}