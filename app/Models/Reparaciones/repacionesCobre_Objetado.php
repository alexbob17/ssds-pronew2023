<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class repacionesCobre_Objetado extends Model
{
    protected $table = 'reparacionesCobre_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionCobre',
        'MotivoObjetada_Cobre',
        'OrdenObjReparacionCobre',
        'TrabajadoObjetadaCobre',
        'ComentariosObjetados_Cobre',
        'username_creacion',
		'username_atencion',
    ];
}