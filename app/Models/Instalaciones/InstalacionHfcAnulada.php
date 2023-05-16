<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionHfcAnulada extends Model
{
    protected $table = 'instalacionhfc_anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividad',
        'MotivoAnulada_Hfc',
		'orden_internet_hfc',
        'orden_tv_hfc',
        'orden_linea_hfc',
		'TrabajadoAnulada_Hfc',
	    'ComentarioAnulada_Hfc',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}