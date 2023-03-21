<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoGpon_Realizado extends Model
{
    protected $table = 'postventaTrasladoGpon_Realizado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'TipoActividadTrasladoGpon',
        'OrdenTvTrasladoGpon',
        'OrdenInternetTrasladoGpon',
        'OrdenLineaTrasladoGpon',
        'ObvsTrasladoGpon',
        'TrabajadoTrasladoGpon',
        'RecibeTrasladoGpon',
        'NodoTrasladoGpon',
        'TapTrasladoGpon',
        'PosicionTrasladoGpon',
        'MaterialesTrasladoGpon',
        'username_creacion',
		'username_atencion',
    ];
}