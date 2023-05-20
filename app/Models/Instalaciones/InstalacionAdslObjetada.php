<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionAdslObjetada extends Model
{
    
    protected $table = 'instalacionadsl_objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividadAdsl',
        'MotivoObjetada_Adsl',
		'OrdenAdsl_Objetada',
		'TrabajadoAdslObjetado',
	    'ComentariosObjetada_Adsl',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
    
}