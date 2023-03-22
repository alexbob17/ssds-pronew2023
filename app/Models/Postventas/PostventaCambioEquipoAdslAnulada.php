<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoAdslAnulada extends Model
{
    protected $table = 'postventaCambioEquipoAdsl_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioAdsl',
        'MotivoEquipoAnulada_Adsl',
        'OrdenAnuladaEquipoAdsl',
        'TrabajadoEquipoAnulada_Adsl',
        'ComentsEquipoAnulada_Adsl',
        'username_creacion',
		'username_atencion',
    ];
}