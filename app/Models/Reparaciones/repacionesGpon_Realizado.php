<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesGpon_Realizado extends Model
{
    protected $table = 'reparacionesGpon_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionGpon',
        'CodigoCausaGpon',
        'DescripcionCausaDañoGpon',
        'DescripcionTipoDañoGpon',
        'DescripcionUbicacionGpon',
        'OrdenRealizadoGpon',
        'syrengGpon',
        'ObservacionesGpon',
        'RecibeGpon',
        'TrabajadoGpon',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}