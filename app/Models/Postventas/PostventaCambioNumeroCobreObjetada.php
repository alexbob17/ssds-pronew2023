<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioNumeroCobreObjetada extends Model
{
    protected $table = 'postventaCambioCobre_Objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadCambioNumeroCobre',
        'MotivoObjCambioCobre',
        'OrdenObjCambioCobre',
        'TrabajadoObjCambioCobre',
        'ObvsObjCambioCobre',
        'ComentariosCambioCobre',
        'username_creacion',
		'username_atencion',
    ];
}