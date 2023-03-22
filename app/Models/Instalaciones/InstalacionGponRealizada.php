<?php

namespace SSD\Models\Instalaciones;


use Illuminate\Database\Eloquent\Model;

class InstalacionGponRealizada extends Model
{
    protected $table = 'instalaciongpon_realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'OrdenInternet_Gpon',
        'OrdenTv_Gpon',
        'OrdenLinea_Gpon',
        'tecnologia',
        'tipo_actividadGpon',
        'equipotv1Gpon',
        'equipotv2Gpon',
        'equipostv3Gpon',
        'equipostv4Gpon',
        'equipostv5Gpon',
        'EqModenGpon',
        'GeoreferenciaGpon',
        'SapGpon',
        'NumeroGpon',
        'TrabajadoGpon',
        'ObservacionesGpon',
        'RecibeGpon',
        'NodoGpon',
        'CajaGpon',
        'PuertoGpon',
        'MaterialesRedGpon',
        'username_creacion',
		'username_atencion',
    
    ];
}