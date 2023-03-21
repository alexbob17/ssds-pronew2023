<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionHfc_Objetado extends Model
{
    protected $table = 'postventaAdicionHfc_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadAdicionHfc',
        'MotivoObjAdicionHfc',
        'OrdenAdicionObjHfc',
        'TrabajadoObjAdicionHfc',
        'ObvsAdicionObjHfc',
        'ComentariosObjAdicionHfc',
        'username_creacion',
		'username_atencion',
    ];
}