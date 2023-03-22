<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoGpon_Anulado extends Model
{
    protected $table = 'postventaCambioEquipoGpon_Anulado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioGpon',
        'MotivoAnuladaObj_Gpon',
        'OrdenEquipoAnuladaGpon',
        'TrabajadoEquipoAnulada_Gpon',
        'ComentarioEquipoAnulada_Gpon',
        'username_creacion',
		'username_atencion',
    ];
}