<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesAdsl_Objetado extends Model
{
    protected $table = 'reparacionesAdsl_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionAdsl',
        'MotivoObjetada_Adsl',
        'OrdenObjAdsl',
        'TrabajadoObjetadaAdsl',
        'ComentsObjAdsl',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}