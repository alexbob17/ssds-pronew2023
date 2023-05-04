<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class reparacionesHfc_Objetado extends Model
{
    protected $table = 'reparacionesHfc_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionHfc',
        'MotivoObjetada_Hfc',
        'OrdenObjHfc',
        'TrabajadoReparacionesObjetadaHfc',
        'ComentariosObjetados_Hfc',
        'username_creacion',
		'username_atencion',
    ];                                       
}