<?php


namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class consultasRealizada extends Model
{
    protected $table = 'consultasRealizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'MotivoConsulta',
        'TipoMotivoConsulta',
        'OrdenConsulta',
        'ObvsConsulta',
        'username_creacion',
		'username_atencion',
        'codigoUnico',
    ];
}