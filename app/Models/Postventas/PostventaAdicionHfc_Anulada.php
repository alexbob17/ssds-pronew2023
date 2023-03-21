<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionHfc_Anulada extends Model
{
    protected $table = 'postventaAdicionHfc_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadAdicionHfc',
        'MotivoAdicionAnulada_Hfc',
        'NOrdenAdicionAnuladaHfc',
        'TrabajadoAdicionAnulada_Hfc',
        'ComentarioAdicionAnulada_Hfc',
        'username_creacion',
		'username_atencion',
    ];
}