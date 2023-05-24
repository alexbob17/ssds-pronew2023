<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesDth_Transferido extends Model
{
    protected $table = 'reparacionesDth_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionDth',
        'OrdenTransferidoDth',
        'ObvsTransferidoDth',
        'ComentarioTransferidoDth',
        'TrabajadoTransferidoDth',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}