<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionGponTransferida extends Model
{
    protected $table = 'instalaciongpon_transferida';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadGpon',
        'OrdenInternet_Gpon',
        'OrdenTv_Gpon',
        'OrdenLinea_Gpon',
        'MotivoTransferidoGpon',
        'TrabajadoTransferido_Gpon',
        'ComentarioTransferido_Gpon',
    ];
}