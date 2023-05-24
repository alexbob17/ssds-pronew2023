<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionDth_Objetado extends Model
{
    protected $table = 'postventaAdicionDth_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadAdicionDth',
        'MotivoObjAdicionDth',
        'NOrdenAdicionObjDth',
        'TrabajadoAdicionObjDth',
        'ObvsAdicionObjDth',
        'ComentariosAdicionObjDth',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}