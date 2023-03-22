<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaMigracionRealizada extends Model
{
    protected $table = 'postventaMigracion_Realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadMigracionHfc',
	    'equipotvmigracion1',
		'equipotvmigracion2',
	    'equipotvmigracion3',
        'equipotvmigracion4',
		'equipotvmigracion5',
	    'NOrdenMigracionHfc',
		'SyrengMigracionHfc',
		'SapMigracionHfc',
		'ObvsMigracionHfc',
		'TrabajadoMigracionHfc',
		'RecibeMigracionHfc',
		'NodoMigracionHfc',
        'TapMigracionRealizadaHfc',
        'PosicionMigracionHfc',
        'GeorefMigracionHfc',
        'MaterialesMigracionHfc',
        'username_creacion',
		'username_atencion',
    ];
}