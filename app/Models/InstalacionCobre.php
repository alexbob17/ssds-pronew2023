<?php

namespace SSD;

use Illuminate\Database\Eloquent\Model;

class InstalacionCobre extends Model
{
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'motivo_llamada',
        'tecnico',
        'tecnologia',
        'tipo_orden',
        'orden_linea',
        'tipo_actividad',
        'numero',
        'sap',
        'georeferencia',
        'observaciones',
        'recibe',
        'materiales',
        'trabajado',
        'fecha_creacion',
        'fecha_atencion',
        'periodo_creacion',
        'periodo_atencion',
        'username_creacion',
        'username_atencion',
    ];

    public function userCreacion()
    {
        return $this->belongsTo(User::class, 'username_creacion', 'username');
    }

    public function userAtencion()
    {
        return $this->belongsTo(User::class, 'username_atencion', 'username');
    }
}