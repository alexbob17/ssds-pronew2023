<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoHfc_Transferido extends Model
{
    protected $table = 'postventaTrasladoHfc_Transferido';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadTrasladoHfc',
        'OrdenTvTransferidoHfc',
        'OrdenInternetTransferidoHfc',
        'OrdenLineaTransferidoHfc',
        'MotivoTransTrasladoHfc',
        'TrabajadoTransTrasladoHfc',
        'ComentarioTrasladoTransHfc',
        'username_creacion',
		'username_atencion',
    ];
}