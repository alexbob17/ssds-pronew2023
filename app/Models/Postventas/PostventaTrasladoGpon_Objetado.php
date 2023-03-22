<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoGpon_Objetado extends Model
{
    protected $table = 'postventaTrasladoGpon_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadTrasladoGpon',
        'OrdenTvTrasladoObjGpon',
        'OrdenInterObjTraslGpon',
        'OrdenLineaTraslObjGpon',
        'MotivoObjTrasladoGpon',
        'TrabajadoTrasladoObjGpon',
        'ObvsTrasladoObjGpon',
        'ComentTrasladoObjGpon',
        'username_creacion',
		'username_atencion',
    ];
}