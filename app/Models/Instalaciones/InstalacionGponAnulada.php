<?php

namespace SSD\Models\Instalaciones;

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
        'tecnologia',
        'tipo_actividadGpon',
        'MotivoAnulada_Gpon',
		'OrdenInternet_Gpon',
        'OrdenTv_Gpon',
        'OrdenLinea_Gpon',
		'TrabajadoAnulada_Gpon',
	    'ComentarioAnulada_Gpon',
        'username_creacion',
		'username_atencion',
		'codigoUnico',
    ];

}