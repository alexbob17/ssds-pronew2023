<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesAdsl_Transferido extends Model
{
    protected $table = 'reparacionesAdsl_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionAdsl',
        'OrdenTransferidoAdsl',
        'ObvsAdslTransferido',
        'TrabajadoTransferidoAdsl',
        'ComentsTransferidoAdsl',
        'username_creacion',
		'username_atencion',
    ];
}