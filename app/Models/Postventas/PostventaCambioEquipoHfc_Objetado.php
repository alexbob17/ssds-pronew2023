<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoHfc_Objetado extends Model
{
    protected $table = 'postventaCambioEquipoHfc_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioHfc',
        'MotivoEquipoObjHfc',
        'NordenObjEquipoHfc',
        'TrabajadoObjEquipoHfc',
        'ObvsObjEquipoHfc',
        'ComentsEquipoObjHfc',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}