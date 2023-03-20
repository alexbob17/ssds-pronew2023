<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionGpon_Realizado extends Model
{
    protected $table = 'postventaAdicionGpon_Realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadAdicionGpon',
        'equipostvAdicionGpon1',
        'equipostvAdicionGpon2',
        'equipostvAdicionGpon3',
        'equipostvAdicionGpon4',
        'equipostvAdicionGpon5',
        'NOrdenAdicionGpon',
        'TrabajadoAdicionGpon',
        'ObvsAdicionGpon',
        'RecibeAdicionGpon',
        'username_creacion',
		'username_atencion',
    ];
}