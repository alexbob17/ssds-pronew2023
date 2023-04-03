<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class reparacionesHfc_Transferido extends Model
{
    protected $table = 'reparacionesHfc_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionHfc',
        'OrdenTransfHfc',
        'ObvsTransfHfc',
        'ComentarioTransfHfc',
        'TrabajadoTransfHfc',
        'username_creacion',
		'username_atencion',
    ];
}