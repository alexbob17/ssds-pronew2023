<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoHfc_Realizado extends Model
{
    protected $table = 'postventaTrasladoHfc_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoHfc',
        'OrdenTvTrasladoHfc',
        'OrdenInternetTrasladoHfc',
        'OrdenLineaTrasladoHfc',
        'ObservacionesTrasladoHfc',
        'TrabajadoTrasladoHfc',
        'RecibeHfcRealizado',
        'NodoTrasladoHfc',
        'TapTrasladoHfc',
        'PosicionTrasladoHfc',
        'MaterialesTrasladoHfc',
        'username_creacion',
		'username_atencion',
    ];
}