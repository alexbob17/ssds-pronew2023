<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaRetiroDthRealizada extends Model
{
    protected $table = 'postventaRetiroDth_Realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadReconexionDth',
	    'EquipoModemRetiroDth',
		'OrdenRetiroDth',
	    'TrabajadoRetiroDth',
		'ObvsRetiroDth',
	    'RecibeRetiroDth',
		'MaterialesRetiroDth',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}