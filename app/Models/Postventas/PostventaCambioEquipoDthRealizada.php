<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoDthRealizada extends Model
{
    protected $table = 'postventaCambioEquipoDth_Objetado';
    
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
        'MotivoObjEquipoDth',
        'OrdenEquipoObjDth',
        'TrabajadoEquipoObjDth',
        'ObvsEquipoObjDth',
        'ComentsEquipoObjDth',
        'username_creacion',
		'username_atencion',
    ];
}