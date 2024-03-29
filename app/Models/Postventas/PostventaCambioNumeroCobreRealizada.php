<?php

namespace SSD\Models\Postventas;

use Illuminate\Database\Eloquent\Model;

class PostventaCambioNumeroCobreRealizada extends Model
{
    protected $table = 'postventaCambioCobre_Realizada';
    
    protected $fillable = [
        'codigo_tecnico',
        'telefono',
        'tecnico',
        'motivo_llamada',
        'Select_Postventa',
        'select_orden',
        'dpto_colonia',
        'tecnologia',
        'TipoActividadCambioNumeroCobre',
        'NumeroCobreCambio',
        'OrdenCambioCobre',
        'TrabajadoCambioCobre',
        'ObvsCambioCobre',
        'RecibeCambioCobre',
        'username_creacion',
		'username_atencion',
		'codigoUnico',

    ];
}