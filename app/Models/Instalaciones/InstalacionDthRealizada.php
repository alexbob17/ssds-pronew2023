<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionDthRealizada extends Model
{
    protected $table = 'instalaciondth_realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'tipo_actividadDth',
        'ordenTv_Dth',
        'SyrengDth',
        'GeoreferenciaDth',
        'sap_dth',
        'TrabajadoDthRealizado',
        'SmarcardDth1',
        'SmarcardDth2',
        'SmarcardDth3',
        'SmarcardDth4',
        'SmarcardDth5',
        'StbDth1',
        'StbDth2',
        'StbDth3',
        'StbDth4',
        'StbDth5',
        'ObservacionesDth',
        'RecibeDth',
        'MaterialesDth',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}