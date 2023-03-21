<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoCobre_Realizado extends Model
{
    protected $table = 'postventaTrasladoCobre_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoCobre',
        'OrdenTrasladoCobre',
        'GeorefTrasladoCobre',
        'MaterialesTrasladoCobre',
        'TrabajadoTrasladoCobre',
        'ObvsTrasladoCobre',
        'RecibeTrasladoCobre',
        'username_creacion',
		'username_atencion',
    ];
}