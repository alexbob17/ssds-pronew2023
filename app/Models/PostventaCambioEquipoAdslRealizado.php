<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoAdslRealizado extends Model
{
    protected $table = 'postventaCambioEquipoAdsl_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadCambioAdsl',
        'InstalacionEquipoAdsl',
        'DesinstalarEquipoAdsl',
        'OrdenEquipoAdsl',
        'ObvsEquipoAdsl',
        'RecibeEquipoAdsl',
        'TrabajadoEquipoAdsl',
        'username_creacion',
		'username_atencion',
    ];
}