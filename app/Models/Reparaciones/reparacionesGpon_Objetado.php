<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class reparacionesGpon_Objetado extends Model
{
    protected $table = 'reparacionesGpon_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionGpon',
        'MotivoObjetada_Gpon',
        'OrdenObjGpon',
        'TrabajadoObjetadaGpon',
        'ComentariosObjGpon',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}