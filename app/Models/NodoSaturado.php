<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class NodoSaturado extends Model {
	protected $table = 'nodos_saturados';
	
	protected $fillable = [
			'nombre_cliente',
			'no_contrato',
			'ubicacion_geografica',
			'barrio',
			'direccion',
			'codigo_dano',
			'fecha_registro_dano',
			'nodo_saturado',
			'nomenclatura_nodo',
			'estado_gestion',
			'estado',
			'dias_dilacion',
			'fecha_creacion',
			'fecha_atencion',
			'periodo_creacion',
			'periodo_atencion',
			'username_creacion',
			'username_atencion',
	];	
}