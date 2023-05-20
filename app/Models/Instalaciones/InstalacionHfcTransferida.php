<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionHfcTransferida extends Model
{
    protected $table = 'instalacionhfc_transferida';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividad',
        'orden_tv_hfc',
        'orden_internet_hfc',
        'orden_linea_hfc',
        'TrabajadoTransferido_Hfc',
        'MotivoTransferidoHfc',
        'ComentariosTransferida_Hfc',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}