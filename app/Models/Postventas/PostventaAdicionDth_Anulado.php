<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaAdicionDth_Anulado extends Model
{
    protected $table = 'postventaAdicionDth_Anulado';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadAdicionDth',
        'MotivoAdicionAnulada_Dth',
        'OrdenAdicionAnulada_Dth',
        'TrabajadoAdicionAnulada_Dth',
        'ComentarioAdicionAnulada_Dth',
        'username_creacion',
		'username_atencion',
    ];
}