<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionHfc_Realizado extends Model
{
    protected $table = 'postventaAdicionHfc_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadAdicionHfc',
        'equipostvAdicionHfc1',
        'equipostvAdicionHfc2',
        'equipostvAdicionHfc3',
        'equipostvAdicionHfc4',
        'equipostvAdicionHfc5',
        'NOrdenAdicionHfc',
        'TrabajadoAdicionHfc',
        'obvsAdicionHfc',
        'RecibeAdicionHfc',
        'username_creacion',
		'username_atencion',
    ];
}