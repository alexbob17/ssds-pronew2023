<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class Penalizacion extends Model {
	protected $table = 'penalizaciones';
	
	protected $fillable = [
			'fecha_reporte',
			'nivel',
			'nombre_agente',
			'aplicativo',
			'falta_cometida',
			'no_solicitud',
			'reincidencia',
			'tipo_orden',
			'tecnologia',
			'descripcion',
			'periodo',
			'username'
	];	
}