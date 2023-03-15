<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class InstalacionGponAnulada extends Model
{
    protected $table = 'instalaciongpon_anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadGpon',
        'MotivoAnulada_Gpon',
		'OrdenInternet_Gpon',
        'OrdenTv_Gpon',
        'OrdenLinea_Gpon',
		'TrabajadoAnulada_Gpon',
	    'ComentarioAnulada_Gpon',
    ];

}