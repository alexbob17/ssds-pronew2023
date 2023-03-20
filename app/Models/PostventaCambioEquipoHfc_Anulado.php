<?php

namespace SSD\Models;


use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoHfc_Anulado extends Model
{
    protected $table = 'postventaCambioEquipoHfc_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadCambioHfc',
        'MotivoEquipoAnulada_Hfc',
        'OrdenAnuladaEquipoHfc',
        'TrabajadoEquipoAnulada_Hfc',
        'ComentarioAnuladaEquipoHfc',
        'username_creacion',
		'username_atencion',
    ];
}