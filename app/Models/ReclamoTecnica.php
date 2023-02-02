<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class ReclamoTecnica extends Model {
	protected $table = 'reclamos_tecnica';
	
	protected $fillable = [
			'tipo_tecnico',
			'codigo_tecnico',
			'nombre_tecnico',
			'tecnologia',
			'id_producto',
			'id_solicitud',
			'lider_tecnica',
			'causa_reclamo',
			'observaciones',
			'resolucion_tecnica',
			'estado',
			'fecha_creacion',
			'fecha_atencion',
			'periodo_creacion',
			'periodo_atencion',
			'username_creacion',
			'username_atencion',
	];	
}