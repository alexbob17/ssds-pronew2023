<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoGpon_Transferido extends Model
{
    protected $table = 'postventaTrasladoGpon_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadTrasladoGpon',
        'OrdenTvTrasladoTransGpon',
        'OrdenIntTransladoGpon',
        'OrdenLineaTrasladoTransGpon',
        'MotivoTransTrasladoGpon',
        'TrabajadoTraslTransGpon',
        'ComentTrasladoTransGpon',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}