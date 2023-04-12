<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class agendamientosRealizados extends Model
{
    protected $table = 'agendamientosRealizados';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Agendamiento',
        'TipoAgendamiento',
        'fecha_registro',
        'hora_registro',
        'N_Orden',
        'Observaciones',
        'Recibe',
        'username_creacion',
		'username_atencion',
    ];
}