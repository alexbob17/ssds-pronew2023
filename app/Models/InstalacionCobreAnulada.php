<?php

namespace SSD\Models;

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
        'tipo_actividadDth',
        'MotivoAnulada_Cobre',
        'OrdenAnuladaCobre',
        'TrabajadoAnulada_Cobre',
        'ComentarioAnulada_Cobre',
    ];
}