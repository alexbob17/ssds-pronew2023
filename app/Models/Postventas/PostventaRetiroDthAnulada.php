<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaRetiroDthAnulada extends Model
{
    protected $table = 'postventaRetiroDth_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadReconexionDth',
		'MotivoRetiroAnulada_Dth',
	    'OrdenRetiroAnulacionDth',
		'TrabajadoRetiroAnulada_Dth',
	    'ComentsRetiroAnulada_Dth',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}