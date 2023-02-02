<?php 

namespace SSD\Repositories;

use DB;
use Carbon\Carbon;
use SSD\Models\ReclamoTecnica;
use SSD\User;


class ReclamoTecnicaRepository extends BaseRepository {

	public function __construct(ReclamoTecnica $reclamo_tecnica)
	{
		$this->model = $reclamo_tecnica;
	}

	public function index($n)
	{
		return $this->model
		->latest()
		->paginate($n);
	}

	public function store($inputs, $user_id)
	{
		$reclamo_tecnica = new $this->model;
		$reclamo_tecnica->tipo_tecnico		= $inputs['tipo_tecnico'];
		$reclamo_tecnica->codigo_tecnico	= trim($inputs['codigo_tecnico']);
		$reclamo_tecnica->nombre_tecnico	= trim($inputs['nombre_tecnico']);
		$reclamo_tecnica->tecnologia		= $inputs['tecnologia'];
		$reclamo_tecnica->id_producto		= $inputs['id_producto'];
		$reclamo_tecnica->id_solicitud		= $inputs['id_solicitud'];
		$reclamo_tecnica->lider_tecnica		= trim($inputs['lider_tecnica']);
		$reclamo_tecnica->causa_reclamo		= $inputs['causa_reclamo'];
		$reclamo_tecnica->observaciones		= trim($inputs['observaciones']);	
		$reclamo_tecnica->fecha_creacion	= Carbon::now();
		$reclamo_tecnica->periodo_creacion	= Carbon::now()->format('Ym');
		$reclamo_tecnica->username_creacion	= $user_id;
		$reclamo_tecnica->estado			= 'PENDIENTE';		
		$reclamo_tecnica->save();
		return $reclamo_tecnica->id;
	}
	
	public function update($inputs, $user_id)
	{
		$reclamo_tecnica = $this->getById($inputs['ticket']);
		$reclamo_tecnica->resolucion_tecnica	= trim($inputs['resolucion_tecnica']);
		$reclamo_tecnica->fecha_atencion		= Carbon::now();
		$reclamo_tecnica->periodo_atencion		= Carbon::now()->format('Ym');
		$reclamo_tecnica->username_atencion		= $user_id;
		$reclamo_tecnica->estado = 'ATENDIDO';
		$reclamo_tecnica->save();
		return $reclamo_tecnica;
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
	
	public function searchCases($option, $pattern) {
		$query = ReclamoTecnica::select(
				'id AS ticket',
				'codigo_tecnico',
				'nombre_tecnico',
				'id_producto',
				'estado',
				'username_creacion',
				'fecha_creacion'
			);
	
		if($option == 'ticket' && is_numeric($pattern)) {
			$query = $query->where('id', '=', $pattern);
		} else {
			switch ($option) {
				case 'id_solicitud'	: $filter = 'id_solicitud'; break;
					case 'id_producto'	: $filter = 'id_producto';	break;
			}
	
			if(!isset($filter)) return array();
	
			$query = $query->where($filter, 'LIKE','%' . $pattern . '%');
		}
		$result = $query->limit(10)->get();
	
		return $result;
	}
	
	public function getFullCase($id) {
		$query = ReclamoTecnica::join('users AS users_atencion', 'reclamos_tecnica.username_atencion', '=', 'users_atencion.username')
			->join('users AS users_creacion', 'reclamos_tecnica.username_creacion', '=', 'users_creacion.username')
			->select(DB::raw(
				'reclamos_tecnica.*, ' .
				'CONCAT(users_atencion.first_name, " ", users_atencion.last_name) as usuario_atencion,' . 
				'CONCAT(users_creacion.first_name, " ", users_creacion.last_name) as usuario_creacion'
			))
			->where('reclamos_tecnica.id', '=', $id);
	
		$result = $query->get()->first();
	
		$result['fecha_registro'] = $result['created_at']->format('Y-m-d h:m:s a');
		unset($result['created_at']);
		unset($result['updated_at']);
	
		return $result;
	}
	
	public function getServedReporting($begin_date, $end_date, $username) {
	
		$query = ReclamoTecnica::join('users', 'reclamos_tecnica.username_atencion', '=', 'users.username')
			->select(DB::raw(
				'reclamos_tecnica.id AS ticket, ' .
				'reclamos_tecnica.estado, ' .
				'reclamos_tecnica.fecha_atencion, ' .
				'reclamos_tecnica.fecha_creacion, ' .
				'reclamos_tecnica.tipo_tecnico, ' .
				'reclamos_tecnica.codigo_tecnico, ' .
				'reclamos_tecnica.nombre_tecnico, ' .
				'reclamos_tecnica.tecnologia, ' .
				'reclamos_tecnica.id_producto, ' .
				'reclamos_tecnica.id_solicitud, ' .
				'reclamos_tecnica.lider_tecnica, ' .
				'reclamos_tecnica.causa_reclamo, ' .
				'reclamos_tecnica.observaciones, ' .
				'reclamos_tecnica.resolucion_tecnica, ' .
				'reclamos_tecnica.username_atencion AS login, ' .
				'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario'
			))
			->where('reclamos_tecnica.estado', '=', 'ATENDIDO')
			->where('reclamos_tecnica.fecha_atencion', '>=', $begin_date)
			->where('reclamos_tecnica.fecha_atencion', '<=', $end_date);
				
		if($username != 'all_users') {
			$query = $query->where('reclamos_tecnica.username_atencion', '=', $username);
		}
		
		return $query->get();
	}
	
	public function getPendingReporting() {
	
		$query = ReclamoTecnica::join('users', 'reclamos_tecnica.username_creacion', '=', 'users.username')
			->select(DB::raw(
				'reclamos_tecnica.id AS ticket, ' .
				'reclamos_tecnica.estado, ' .
				'reclamos_tecnica.fecha_creacion, ' .
				'reclamos_tecnica.tipo_tecnico, ' .
				'reclamos_tecnica.codigo_tecnico, ' .
				'reclamos_tecnica.nombre_tecnico, ' .
				'reclamos_tecnica.tecnologia, ' .
				'reclamos_tecnica.id_producto, ' .
				'reclamos_tecnica.id_solicitud, ' .
				'reclamos_tecnica.lider_tecnica, ' .
				'reclamos_tecnica.causa_reclamo, ' .
				'reclamos_tecnica.observaciones, ' .
				'reclamos_tecnica.username_creacion AS login, ' .
				'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario'
			))
			->where('reclamos_tecnica.estado', '=', 'PENDIENTE');
		
		$results = $query->get();
		
		return $results;
	}
}