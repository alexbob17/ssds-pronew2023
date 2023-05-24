<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoGpon_Realizado extends Model
{
    protected $table = 'postventaCambioEquipoGpon_Realizado';
    
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
        'InstalacionEquipoGpon',
        'DesinstalarEquipoGpon',
        'NOrdenEquipoGpon',
        'ObvsEquipoGpon',
        'RecibeEquipoGpon',
        'TrabajadoEquipoGpon',
        'username_creacion',
        'username_atencion',
		'codigoUnico',

    ];

}