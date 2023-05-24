<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class reparacionesGpon_Transferido extends Model
{
    protected $table = 'reparacionesGpon_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionGpon',
        'OrdenTransGpon',
        'ObvsTransfGpon',
        'ComentarioTransfGpon',
        'TrabajadoTransfGpon',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}