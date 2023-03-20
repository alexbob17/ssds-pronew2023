<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoDth_Objetado extends Model
{
    protected $table = 'postventaTrasladoDth_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoDth',
        'MotivoObjTrasladoDth',
        'OrdenTrasladoObjDth',
        'TrabajadoTrasladoObj_Dth',
        'ObvsTrasladoObjDth',
        'ComentariosTrasladoObjDth',
        'username_creacion',
		'username_atencion',
    ];
}