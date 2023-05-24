<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesDth_Realizado extends Model
{
    protected $table = 'reparacionesDth_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionDth',
        'CodigoCausaDth',
        'DescripcionCausaDth',
        'DescripcionTipoDañoDth',
        'DescripcionUbicacionDañoDth',
        'OrdenDthRealizada',
        'syrengDthRealizado',
        'ObservacionesDth',
        'RecibeDth',
        'TrabajadoDth',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}