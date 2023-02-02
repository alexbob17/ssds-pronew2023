<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class Qflow extends Model {
	protected $table = 'qflows';
	
	protected $fillable = [
			'no_caso_qflow',
			'fecha_registro',
			'fecha_recibido',
			'asesor',
			'tipo_servicio',
			'no_producto',
			'tipologia',
			'no_dano_solicitud',
			'dias_dilacion',
			'tipo_caso',
			'workflow',
			'medio_ingreso',
			'observaciones',
			'fecha_creacion',
			'periodo',
			'id_tienda',
			'username',
	];	
}