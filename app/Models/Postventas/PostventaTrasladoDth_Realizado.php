<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoDth_Realizado extends Model
{

    protected $table = 'postventaTrasladoDth_Realizada';

    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadTrasladoDth',
        'OrdenTrasladoDth',
        'GeorefTrasladoDth',
        'MaterialesTrasladoDth',
        'TrabajadoTrasladoDth',
        'ObvsTrasladoDth',
        'RecibeTrasladoDth',
        'username_creacion',
		'username_atencion',
    ];
}