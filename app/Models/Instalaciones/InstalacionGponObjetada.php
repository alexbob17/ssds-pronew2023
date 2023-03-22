<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionGponObjetada extends Model
{
    protected $table = 'instalaciongpon_objetada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividadGpon',
        'OrdenInternet_Gpon',
        'OrdenTv_Gpon',
        'OrdenLinea_Gpon',
        'MotivoObjetado_Gpon',
        'TrabajadoGpon_Objetado',
        'ComentarioTransferido_Gpon',
        'username_creacion',
		'username_atencion',
    ];
}