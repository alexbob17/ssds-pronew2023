<?php

namespace SSD\Models\Reparaciones;

use Illuminate\Database\Eloquent\Model;

class reparacionesHfc_Realizado extends Model
{
    protected $table = 'reparacionesHfc_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tecnologia',
        'select_orden',
        'dpto_colonia',
        'TipoActividadReparacionHfc',
        'CodigoCausaHfc',
        'DescripcionCausaDañoHfc',
        'DescripcionTipoDañoHfc',
        'DescripcionUbicacionHfc',
        'OrdenHfc',
        'syrengHfc',
        'ObservacionesHfc',
        'RecibeHfc',
        'TrabajadoHfcRealizado',
        'username_creacion',
		'username_atencion',
    ];
}