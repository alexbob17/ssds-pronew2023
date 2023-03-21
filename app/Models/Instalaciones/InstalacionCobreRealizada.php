<?php

namespace SSD\Models\Instalaciones;


use Illuminate\Database\Eloquent\Model;

class InstalacionCobreRealizada extends Model
{
    protected $table = 'instalacioncobre_realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'select_orden',
        'dpto_colonia',
        'tipo_actividadCobre',
        'OrdenLineaCobre',
        'NumeroCobre',
        'GeoreferenciaCobre',
        'sap_cobre',
        'TrabajadoCobre',
        'ObservacionesCobre',
        'RecibeCobre',
        'MaterialesCobre',
    ];
}