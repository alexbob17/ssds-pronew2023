<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoHfc_Anulado extends Model
{
    protected $table = 'postventaTrasladoHfc_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoHfc',
        'OrdenTvAnulTraslHfc',
        'OrdenInterAnulTraslHfc',
        'OrdenLineaAnulTraslHfc',
        'MotivoAnuladaTraslado_Hfc',
        'TrabajadoAnuladaTraslado_Hfc',
        'ComenAnuladaTraslado_Hfc',
        'username_creacion',
		'username_atencion',
    ];
}