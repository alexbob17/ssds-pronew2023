<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalacionhfc extends Model
{
    protected $table = 'instalacionhfc';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'motivo_llamada',
        'tecnico',
        'tecnologia',
        'tipo_orden',
        'orden_tv',
        'orden_internet',
        'orden_linea',
        'motivo_actividad',
        'syreng',
        'sap',
        'equipos_tv',
        'equipo_modem',
        'numero_voip',
        'georeferencia',
        'observaciones',
        'recibe',
        'trabajado',
        'fecha_creacion',
        'fecha_atencion',
        'periodo_creacion',
        'periodo_atencion',
        'username_creacion',
        'username_atencion',
    ];
}