<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionAdslRealizada extends Model
{

    protected $table = 'instalacionadsl_realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadAdsl',
        'orden_internet_adsl',
        'Georeferencia_Adsl',
        'TrabajadoAdsl',
        'Obvservaciones_Adsl',
        'Recibe_Adsl',
        'Materiales_Adsl',
    ];
}