<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionCobreAnulada extends Model
{
    protected $table = 'instalacioncobre_anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividadCobre',
        'MotivoAnulada_Cobre',
        'OrdenAnuladaCobre',
        'TrabajadoAnulada_Cobre',
        'ComentarioAnulada_Cobre',
        'username_creacion',
		'username_atencion',
    ];
}