<?php 

namespace SSD\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model {
	protected $table = 'tiendas';
	
	protected $fillable = [
		'nombre',
		'nombre_homologado',
		'tipo',
		'zona',
		'es_visible'
	];	
}