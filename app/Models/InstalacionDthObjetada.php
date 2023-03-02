<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class InstalacionDthObjetada extends Model
{
    protected $table = 'instalaciondth_objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadDth',
        'MotivoObjetada_Dth',
        'TrabajadoObj_Dth',
        'OrdenObj_Dth',
        'ComentarioObjetado_Dth',
    ];
}