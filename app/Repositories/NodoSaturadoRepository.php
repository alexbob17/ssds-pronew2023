<?php 

namespace SSD\Repositories;

use DB;
use Carbon\Carbon;
use SSD\Models\NodoSaturado;
use SSD\User;


class NodoSaturadoRepository extends BaseRepository {

	public function __construct(NodoSaturado $nodo_saturado)
	{
		$this->model = $nodo_saturado;
	}

	public function index($n)
	{
		return $this->model
		->latest()
		->paginate($n);
	}

	public function store($inputs, $user_id)
	{
		$nodo_saturado = new $this->model;
		$nodo_saturado->nombre_cliente		= $inputs['nombre_cliente'];
		$nodo_saturado->no_contrato			= $inputs['no_contrato'];
		$nodo_saturado->ubicacion_geografica= $inputs['ubicacion_geografica'];
		$nodo_saturado->barrio				= $inputs['barrio'];
		$nodo_saturado->direccion			= $inputs['direccion'];
		$nodo_saturado->fecha_registro_dano	= $inputs['fecha_registro_dano'];
		$nodo_saturado->codigo_dano			= $inputs['codigo_dano'];
		$nodo_saturado->nodo_saturado		= $inputs['nodo_saturado'];
		$nodo_saturado->nomenclatura_nodo	= $inputs['nomenclatura_nodo'];
		$nodo_saturado->estado_gestion		= $inputs['estado_gestion'];
		
		if($inputs['comentarios'] != '') {
			$nodo_saturado->comentarios	= "[". $user_id . " " . Carbon::now()->format('Y-m-d h:m:s') . "]: " . trim($inputs['comentarios']);	
		} else {
			$nodo_saturado->comentarios = null;
		}
		
		$nodo_saturado->fecha_creacion	= Carbon::now();
		$nodo_saturado->periodo_creacion	= Carbon::now()->format('Ym');
		$nodo_saturado->username_creacion= $user_id;
		
		if(!($inputs['estado_gestion'] == 'Orden para Trómite de Cambio Tecnología' ||
			$inputs['estado_gestion'] == 'Para Gestión de Trámite')) {
			$nodo_saturado->estado	= 'ATENDIDO';		
			$nodo_saturado->fecha_fin_afectacion	= $inputs['fecha_fin_afectacion'];
			$nodo_saturado->fecha_atencion			= Carbon::now();
			$nodo_saturado->periodo_atencion		= Carbon::now()->format('Ym');
			$nodo_saturado->username_atencion		= $user_id;
			$nodo_saturado->dias_dilacion = Carbon::parse($nodo_saturado->fecha_registro_dano)->diffInDays(Carbon::parse($nodo_saturado->fecha_fin_afectacion));
		} else {
			$inputs['estado'] = 'PENDIENTE';
			$inputs['fecha_fin_afectacion'] = null;
		}
		$nodo_saturado->save();
		return $nodo_saturado->id;
	}
	
	public function update($inputs, $user_id)
	{
		$nodo_saturado = $this->getById($inputs['consecutivo']);
		$nodo_saturado->nombre_cliente		= $inputs['nombre_cliente'];
		$nodo_saturado->no_contrato			= $inputs['no_contrato'];
		$nodo_saturado->ubicacion_geografica= $inputs['ubicacion_geografica'];
		$nodo_saturado->barrio				= $inputs['barrio'];
		$nodo_saturado->direccion			= $inputs['direccion'];
		$nodo_saturado->fecha_registro_dano	= $inputs['fecha_registro_dano'];
		$nodo_saturado->codigo_dano			= $inputs['codigo_dano'];
		$nodo_saturado->nodo_saturado		= $inputs['nodo_saturado'];
		$nodo_saturado->nomenclatura_nodo	= $inputs['nomenclatura_nodo'];
		$nodo_saturado->estado_gestion		= $inputs['estado_gestion'];		
	
		if($inputs['comentarios'] != '') {
			$nodo_saturado->comentarios	= "[". $user_id . " " . Carbon::now()->format('Y-m-d h:m:s') . "]: " . trim($inputs['comentarios']);	
		} else {
			$nodo_saturado->comentarios = null;
		}
		
		if(!($inputs['estado_gestion'] == 'Orden para Trómite de Cambio Tecnología' ||
			$inputs['estado_gestion'] == 'Para Gestión de Trámite')) {
			$nodo_saturado->estado	= 'ATENDIDO';		
			$nodo_saturado->fecha_fin_afectacion	= $inputs['fecha_fin_afectacion'];
			$nodo_saturado->fecha_atencion			= Carbon::now();
			$nodo_saturado->periodo_atencion		= Carbon::now()->format('Ym');
			$nodo_saturado->username_atencion		= $user_id;
			$nodo_saturado->dias_dilacion = Carbon::parse($nodo_saturado->fecha_registro_dano)->diffInDays(Carbon::parse($nodo_saturado->fecha_fin_afectacion));
		} else {
			$inputs['estado'] = 'PENDIENTE';
			$inputs['fecha_fin_afectacion'] = null;
		}		
		$nodo_saturado->save();
		return $nodo_saturado;
	}
	
	public function getUsersCanRegister() {
		$usernames = User::join('role_user', 'users.id', '=', 'role_user.user_id')
			->join('roles', 'role_user.role_id', '=', 'roles.id')
			->select(DB::raw('username, CONCAT(first_name, " ", last_name) as full_name'))
			->where('roles.name','=','operador')
			->orWhere('roles.name','=','admin')
			->where('username', '!=', 'administrator')
			->get()
			->sortBy('full_name')
			->lists('full_name', 'username')
			->all();
			
		return array_merge(['all_users' => 'Todos los usuarios'], $usernames);
	}
	
	public function getServedReporting($begin_date, $end_date, $username) {
	
		$query = NodoSaturado::join('users', 'nodos_saturados.username_atencion', '=', 'users.username')
			->select(DB::raw(
				'nodos_saturados.id AS consecutivo, ' .
				'nodos_saturados.estado, ' .
				'nodos_saturados.fecha_atencion, ' .
				'nodos_saturados.fecha_creacion, ' .
				'nodos_saturados.nombre_cliente, ' .
				'nodos_saturados.no_contrato, ' .
				'nodos_saturados.ubicacion_geografica, ' .
				'nodos_saturados.barrio, ' .
				'nodos_saturados.direccion, ' .
				'nodos_saturados.codigo_dano, ' .
				'nodos_saturados.nodo_saturado, ' .
				'nodos_saturados.nomenclatura_nodo, ' .
				'nodos_saturados.fecha_registro_dano, ' .
				'nodos_saturados.fecha_fin_afectacion, ' .
				'nodos_saturados.dias_dilacion, ' .
				'nodos_saturados.estado_gestion, ' .
				'nodos_saturados.comentarios, ' .
				'nodos_saturados.username_atencion AS login, ' .
				'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario'
			))
			->where('nodos_saturados.estado', '=', 'ATENDIDO')
			->where('nodos_saturados.fecha_atencion', '>=', $begin_date)
			->where('nodos_saturados.fecha_atencion', '<=', $end_date);
				
		if($username != 'all_users') {
			$query = $query->where('nodos_saturados.username_atencion', '=', $username);
		}
		
		return $query->get();
	}
	
	public function getPendingReporting() {
	
		$query = NodoSaturado::join('users', 'nodos_saturados.username_creacion', '=', 'users.username')
			->select(DB::raw(
				'nodos_saturados.id AS consecutivo, ' .
				'nodos_saturados.estado, ' .
				'"- " AS fecha_atencion, ' .
				'nodos_saturados.fecha_creacion, ' .
				'nodos_saturados.nombre_cliente, ' .
				'nodos_saturados.no_contrato, ' .
				'nodos_saturados.ubicacion_geografica, ' .
				'nodos_saturados.barrio, ' .
				'nodos_saturados.direccion, ' .
				'nodos_saturados.codigo_dano, ' .
				'nodos_saturados.nodo_saturado, ' .
				'nodos_saturados.nomenclatura_nodo, ' .
				'nodos_saturados.fecha_registro_dano, ' .
				'"-" AS fecha_fin_afectacion, ' .
				'NULL AS dias_dilacion, ' .
				'nodos_saturados.estado_gestion, ' .
				'nodos_saturados.comentarios, ' .
				'nodos_saturados.username_creacion AS login, ' .
				'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario'
			))
			->where('nodos_saturados.estado', '=', 'PENDIENTE');
		
		$results = $query->get();
		
		$hoy = Carbon::parse(Carbon::now()->format('Y-m-d'));
		foreach ($results as $row) {
			$row->dias_dilacion = Carbon::parse($row->fecha_registro_dano)->diffInDays(Carbon::parse($hoy));
		}
		return $results;
	}
}