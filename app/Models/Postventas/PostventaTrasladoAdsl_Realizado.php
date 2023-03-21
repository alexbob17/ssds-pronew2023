<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoAdsl_Realizado extends Model
{
    protected $table = 'postventaTrasladoAdsl_Realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoAdsl',
        'NOrdenTrasladosAdsl',
        'GeorefTrasladoAdsl',
        'MaterialesTrasladoAdsl',
        'TrabajadoTrasladoAdsl',
        'ObvsTrasladoAdsl',
        'RecibeTrasladoAdsl',
        'username_creacion',
		'username_atencion',
    ];
}