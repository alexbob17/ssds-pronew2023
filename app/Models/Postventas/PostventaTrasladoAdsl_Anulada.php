<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaTrasladoAdsl_Anulada extends Model
{

    protected $table = 'postventaTrasladoAdsl_Anulada';

    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadTrasladoAdsl',
        'MotivoTrasladoAnulada_Adsl',
        'NOrdenTrasladosAnulAdsl',
        'TrabajadoTrasladoTrAnulada_Adsl',
        'ComentarioTrasladoAnulada_Adsl',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}