<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoCobre_Anulada extends Model
{
    protected $table = 'postventaTrasladoCobre_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoCobre',
        'MotivoTrasladoAnulada_Cobre',
        'OrdenTrasladosCobre',
        'TrabajadoAnulada_Cobre',
        'ComentarioTrasladoAnulada_Cobre',
        'username_creacion',
		'username_atencion',
    ];
}