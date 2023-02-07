<?php

namespace SSD;

use Illuminate\Database\Eloquent\Model;

class InstalacionAdsl extends Model
{
    protected $table = 'instalacion_adsl';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'motivo_llamada',
        'tecnico',
        'tecnologia',
        'tipo_orden',
        'orden_internet',
        'tipo_actividad',
        'sap',
        'observaciones',
        'materiales',
        'trabajado',
        'fecha_creacion',
        'fecha_atencion',
        'periodo_creacion',
        'periodo_atencion',
        'username_creacion',
        'username_atencion',
    ];
}