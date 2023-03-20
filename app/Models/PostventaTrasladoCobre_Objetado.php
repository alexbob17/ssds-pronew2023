<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoCobre_Objetado extends Model
{
    protected $table = 'postventaTrasladoCobre_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoCobre',
        'MotivoObjTrasladoCobre',
        'OrdenTrasladoObjCobres',
        'TrabajadoTrasladoObjCobre',
        'ObsObjTrasladoCobre',
        'ComentariosObjTrasladoCobre',
        'username_creacion',
		'username_atencion',
    ];
}