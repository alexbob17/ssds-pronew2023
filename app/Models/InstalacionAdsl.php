<?php

namespace SSD;

use Illuminate\Database\Eloquent\Model;

class InstalacionAdsl extends Model
{
    protected $table = 'instalacion_adsl';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'motivo_llamada',
        'tecnico',
        'tecnologia',
        'tipo_orden',
        'dpto_colonia',    
        'orden_internet',
        'tipo_actividad',
        'observaciones',
        'materiales',
        'trabajado',
        'recibe',
        'georeferencia',
        'motivo_objetada',
        'orden',
        'trabajado_realizada',
        'trabajado_objetado',
        'comentarios_objetado',
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