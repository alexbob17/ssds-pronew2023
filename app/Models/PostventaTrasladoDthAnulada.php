<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoDth_Anulada extends Model
{
    protected $table = 'postventaTrasladoDth_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoDth',
        'MotivoTrasladoAnulada_Dth',
        'OrdenTrasladosDth',
        'TrabajadoTrasladoAnulada_Hfc',
        'ComentarioTrasladoAnulada_Hfc',
        'username_creacion',
		'username_atencion',
    ];
}