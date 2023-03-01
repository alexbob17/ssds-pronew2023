<?php

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class InstalacionAdslRealizada extends Model
{

    protected $table = 'instalacionadsl_realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'tipo_orden',
        'dpto_colonia',
        'tipo_actividadAdsl',
        'orden_internetadsl',
        'GeoRefAdsl',
        'trabajado_adsl',
        'obv_adsl',
        'Recibe_adsl',
        'materialeAdsl',
    ];
}