<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class Inconsistencia extends Model {
	protected $table = 'inconsistencias';
	
	protected $fillable = [
			'no_incidente',
			'tipo_servicio',
			'tipo_inconsistencia',
			'fecha_incidente',
			'fecha_atencion',
			'no_orden',
			'periodo',
			'username'
	];	
}