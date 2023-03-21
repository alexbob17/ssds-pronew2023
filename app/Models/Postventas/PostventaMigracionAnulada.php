<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaMigracionAnulada extends Model
{
    protected $table = 'postventaMigracion_Anulada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadMigracionHfc',
        'MotivoMigracionAnulada_Hfc',
        'NOrdenMigracionAnuladaHfc',
        'TrabajadoMigracionAnulada_Hfc',
        'ComentarioMigracionAnulada_Hfc',
        'username_creacion',
        'username_atencion',
    ];
}