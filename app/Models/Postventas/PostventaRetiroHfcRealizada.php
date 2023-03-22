<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaRetiroHfcRealizada extends Model
{
    protected $table = 'postventaRetiroHfc_Realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadReconexionHfc',
	    'EquipoModemRetiroHfc',
		'OrdenRetiroHfc',
	    'TrabajadoRetiroHfc',
		'ObvsRetiroHfc',
	    'RecibeRetiroHfc',
		'MaterialesRetiroHfc',
        'username_creacion',
		'username_atencion',
    ];
}