<?php

namespace SSD\Models\Instalaciones;

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
        'tecnologia',
        'tipo_actividadCobre',
        'MotivoObjetada_Cobre',
        'OrdenCobre_Objetada',
        'TrabajadoCobre_Objetado',
        'ComentariosCobre_Objetados',
        'username_creacion',
		'username_atencion',

    ];
}