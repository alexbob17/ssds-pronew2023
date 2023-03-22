<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioEquipoDthObjetado extends Model
{
    protected $table = 'postventaCambioEquipoDth_Realizado';
    
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
        'InstalacionEquipoDth',
        'DesinstalarEquipoDth',
        'OrdenEquipoDth',
        'ObvsEquipoDth',
        'RecibeEquipoDth',
        'TrabajadoEquipoDth',
        'username_creacion',
		'username_atencion',
    ];

}