<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesDth_Objetado extends Model
{
    protected $table = 'reparacionesDth_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionDth',
        'MotivoObjetada_Dth',
        'OrdenObjDth',
        'TrabajadoObjetadaDth',
        'ComentariosObjetadosDth',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}