<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesAdsl_Realizado extends Model
{
    protected $table = 'reparacionesAdsl_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionAdsl',
        'CodigoCausaAdsl',
        'DescripcionCausaAdsl',
        'DescripcionTipoDañoAdsl',
        'DescripcionUbicacionDañoAdsl',
        'OrdenAdslRealizado',
        'syrengAdsl',
        'ObservacionesAdsl',
        'RecibeAdsl',
        'TrabajadoReparacionAdsl',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}