<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoDthAnulada extends Model
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
        'tecnologia',
        'TipoActividadTrasladoDth',
        'MotivoTrasladoAnulada_Dth',
        'OrdenTrasladosDth',
        'TrabajadoTrasladoAnulada_Dth',
        'ComentarioTrasladoAnulada_Dth',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}