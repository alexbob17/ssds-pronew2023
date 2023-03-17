<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioNumeroCobreAnulada extends Model
{
    protected $table = 'postventaCambioCobre_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadCambioNumeroCobre',
        'MotivoAnuladaCambioCobre',
        'OrdenAnuladaCambioCobre',
        'TrabajadoAnuladaCambioCobre',
        'ComentarioAnuladaCambioCobre',
        'username_creacion',
		'username_atencion',
    ];
}