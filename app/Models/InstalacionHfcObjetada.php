<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class InstalacionHfcObjetada extends Model
{
    
    protected $table = 'instalacionhfc_objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividad',
        'orden_tv_hfc',
        'orden_internet_hfc',
        'orden_linea_hfc',
        'MotivoObjetada_Hfc',
        'TrabajadoObjetadaHfc',
        'ComentariosObjetados_Hfc',
    ];
}