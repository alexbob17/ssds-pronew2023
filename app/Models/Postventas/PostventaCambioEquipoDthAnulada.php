<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoDthAnulada extends Model
{
    protected $table = 'postventaCambioEquipoDth_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioDth',
        'MotivoEquipoAnulada_Dth',
        'OrdenEquipoAnulada_Dth',
        'TrabajadoEquipoAnulada_Dth',
        'ComentarioEquipoAnulada_Dth',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}