<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model {
	protected $table = 'agentes';
	
	protected $fillable = [
		'codigo',
		'nombre',
		'es_visible'
	];	
}