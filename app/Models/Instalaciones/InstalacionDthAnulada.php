<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionDthAnulada extends Model
{
    protected $table = 'instalaciondth_anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividadDth',
        'MotivoAnulada_Dth',
        'OrdenAnulada_Dth',
        'TrabajadoAnulada_Dth',
        'ComentarioAnulada_Dth',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}