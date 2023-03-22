<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoGpon_Anulado extends Model
{
    protected $table = 'postventaTrasladoGpon_Anulado';
    
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
        'OrdenTvTraslAnuladoGpon',
        'OrdenIntTrasladoAnulGpon',
        'OrdenLineaTraslAnulGpon',
        'MotivoTrasladoAnulada_Gpon',
        'TrabajadoAnuladaTraslado_gpon',
        'ComentarioTrasladoAnulada_Gpon',
        'username_creacion',
		'username_atencion',
    ];
}