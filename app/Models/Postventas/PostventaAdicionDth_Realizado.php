<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionDth_Realizado extends Model
{
    protected $table = 'postventaAdicionDth_Realizado';
    
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
        'equipostvAdicionDth1',
        'equipostvAdicionDth2',
        'equipostvAdicionDth3',
        'equipostvAdicionDth4',
        'equipostvAdicionDth5',
        'NOrdenAdicionDth',
        'TrabajadoAdicionDth',
        'ObvsAdicionDth',
        'RecibeAdicionDth',
        'username_creacion',
		'username_atencion',
    ];
}