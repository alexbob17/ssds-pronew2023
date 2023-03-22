<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionGpon_Objetado extends Model
{
    protected $table = 'postventaAdicionGpon_Objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadAdicionGpon',
        'MotivoAdicionObjGpon',
        'NOrdenAdicionObjGpon',
        'TrabajadoAdicionObjGpon',
        'ObvsAdicionObjGpon',
        'ComentariosAdicionObjGpon',
        'username_creacion',
		'username_atencion',
    ];
}