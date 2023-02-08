<?php

namespace SSD;

use Illuminate\Database\Eloquent\Model;

class InstalacionGpon extends Model
{
    protected $table = 'instalacion_gpon';

    protected $fillable = [
        'codigo_tecnico', 'telefono', 'motivo_llamada', 'tecnico',
        'tecnologia', 'tipo_orden', 'orden_linea', 'orden_internet', 'orden_tv',
        'tipo_actividad', 'numero_gpon', 'sap', 'syreng', 'georeferencia',
        'equipos_tv', 'equipos_modem', 'observaciones', 'recibe', 'materiales',
        'trabajado', 'fecha_creacion', 'fecha_atencion', 'periodo_creacion',
        'periodo_atencion', 'username_creacion', 'username_atencion'
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