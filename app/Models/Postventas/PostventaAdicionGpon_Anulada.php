<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionGpon_Anulada extends Model
{
    protected $table = 'postventaAdicionGpon_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadAdicionGpon',
        'MotivoAdicionAnulada_Gpon',
        'NOrdenAdicionAnuladaGpon',
        'TrabajadoAdicionAnulada_Gpon',
        'ComentarioAdicionAnulada_Gpon',
        'username_creacion',
		'username_atencion',
    ];
}