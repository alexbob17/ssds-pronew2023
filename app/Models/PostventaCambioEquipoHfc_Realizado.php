<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoHfc_Realizado extends Model
{
    protected $table = 'postventaCambioEquipoHfc_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadCambioHfc',
        'InstalacionEquipoHfc',
        'DesinstalarEquipoHfc',
        'NOrdenEquipoHfc',
        'ObvsEquipoHfc',
        'RecibeEquipoHfc',
        'TrabajadoEquipoHfc',
        'username_creacion',
		'username_atencion',
    ];
}