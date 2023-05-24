<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoAdslObjetado extends Model
{
    protected $table = 'postventaCambioEquipoAdsl_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioAdsl',
        'MotivoEquipoObjAdsl',
        'OrdenEquipoObjAdsl',
        'TrabajadoEquipoObjAdsl',
        'ObvsEquipoObjAdsl',
        'ComentsEquipoObjAdsl',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}