<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoGpon_Objetado extends Model
{
    protected $table = 'postventaCambioEquipoGpon_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioGpon',
        'MotivoObjEquipoGpon',
        'NOrdenObjEquipoGpon',
        'TrabajadoObjEquipoGpon',
        'ObvsEquipoObjGpon',
        'ComentsEquipoObjGpon',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}