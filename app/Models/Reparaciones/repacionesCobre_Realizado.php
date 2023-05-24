<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesCobre_Realizado extends Model
{
    protected $table = 'reparacionesCobre_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionCobre',
        'CodigoCausaCobre',
        'DescripcionCausaCobre',
        'DescripcionTipoDañoCobre',
        'DescripcionUbicacionDañoCobre',
        'OrdenReparacionCobre',
        'syrengReparacionCobre',
        'ObservacionesCobre',
        'RecibeCobre',
        'TrabajadoReparacionCobre',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}