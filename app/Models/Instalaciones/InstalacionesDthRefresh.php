<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionesDthRefresh extends Model
{
    protected $table = 'instalacionDth_Refresh';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividadDth',
        'NordenRefresh',
        'refreshSelectDth',
        'ComentarioRefresh_Dth',
        'username_creacion',
		'username_atencion',
    ];
}