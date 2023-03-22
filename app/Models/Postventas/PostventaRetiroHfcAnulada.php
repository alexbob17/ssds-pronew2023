<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaRetiroHfcAnulada extends Model
{
    protected $table = 'postventaRetiroHfc_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadReconexionHfc',
	    'MotivoRetiroAnulada_Hfc',
		'OrdenRetiroAnulacionHfc',
	    'TrabajadoRetiroAnulada_Hfc',
		'ComentsRetiroAnulada_Hfc',
        'username_creacion',
		'username_atencion',
    ];
}