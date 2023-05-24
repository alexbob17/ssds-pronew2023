<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesCobre_Transferido extends Model
{
    protected $table = 'reparacionesCobre_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionCobre',
        'OrdenTransfCobre',
        'ObvsCobreTransferido',
        'ComentarioCobreTransferido',
        'TrabajadoCobreTransferido',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}