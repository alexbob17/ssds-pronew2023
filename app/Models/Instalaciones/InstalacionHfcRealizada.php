<?php

namespace SSD\Models\Instalaciones;

use Illuminate\Database\Eloquent\Model;

class InstalacionHfcRealizada extends Model
{
    
    protected $table = 'instalacionhfc_realizada';
    
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
        'equipostv1',
        'equipostv2',
        'equipostv3',
        'equipostv4',
        'equipostv5',
        'syrengHfc',
        'sapHfc',
        'EquipoModem_Hfc',
        'numeroVoip_hfc',
        'GeorefHfc',
        'TrabajadoHfc',
        'ObservacionesHfc',
        'RecibeHfc',
        'NodoHfc',
        'TapHfc',
        'PosicionHfc',
        'MaterialesHfc',
        'username_creacion',
		'username_atencion',
        'codigoUnico',

    ];
}