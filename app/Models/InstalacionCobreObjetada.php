<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class InstalacionCobreObjetada extends Model
{
    protected $table = 'instalacioncobre_objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadCobre',
        'MotivoObjetada_Cobre',
        'OrdenCobre_Objetada',
        'TrabajadoCobre_Objetado',
        'ComentariosCobre_Objetados',

    ];
}