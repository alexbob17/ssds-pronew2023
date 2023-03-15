<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class InstalacionAdslAnulada extends Model
{
    protected $table = 'instalacionadsl_anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadAdsl',
        'MotivoAnulada_Adsl',
		'OrdenAnuladaAdsl',
		'TrabajadoAnulada_Adsl',
	    'ComentarioAnulada_Adsl',
    ];
}