<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoHfc_Objetado extends Model
{
    protected $table = 'postventaTrasladoHfc_Objetado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoHfc',
        'OrdenTvObjetadoTrasladoHfc',
        'OrdenIntObjTrasladoHfc',
        'OrdenLineaObjetadoTrasladoHfc',
        'MotivoObjTrasladoHfc',
        'TrabajadoObjTrasladoHfc',
        'ObvsObjTrasladoHfc',
        'ComentariosObjTrasladoHfc',
        'username_creacion',
		'username_atencion',
    ];
}