<?php

namespace SSD;

use Illuminate\Database\Eloquent\Model;

class InstalacionDth extends Model
{
    protected $table = 'instalacion_dth';

    protected $fillable = [
        'codigo_tecnico', 'telefono', 'motivo_llamada', 'tecnico', 'tecnologia', 'tipo_orden', 'orden_internet',
        'tipo_actividad', 'sap', 'syreng', 'georeferencia', 'smarcard', 'stb', 'observaciones', 'recibe', 'materiales',
        'trabajado', 'fecha_creacion', 'fecha_atencion', 'periodo_creacion', 'periodo_atencion', 'username_creacion',
        'username_atencion'
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