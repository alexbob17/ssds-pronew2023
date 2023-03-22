<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoAdsl_Objetado extends Model
{
    protected $table = 'postventaTrasladoAdsl_Objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadTrasladoAdsl',
        'MotivoObjTrasladoAdsl',
        'OrdenObjTrasladoAdsl',
        'TrabajadoTrasladoObjAdsl',
        'ObvsTrasladoObjAdsl',
        'ComentariosTrasladosObjAdsl',
        'username_creacion',
		'username_atencion',
    ];
}