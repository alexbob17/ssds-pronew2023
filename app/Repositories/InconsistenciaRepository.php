<?php 

namespace SSD\Repositories;

use DB;
use Carbon\Carbon;
use SSD\Models\Inconsistencia;
use SSD\User;


class InconsistenciaRepository extends BaseRepository {

	public function __construct(Inconsistencia $inconsistencia)
	{
		$this->model = $inconsistencia;
	}

	public function index($n)
	{
		return $this->model
		->latest()
		->paginate($n);
	}

	public function store($inputs, $user_id)
	{
		$inconsistencia = new $this->model;
		$inconsistencia->no_incidente			= $inputs['no_incidente'];
		$inconsistencia->tipo_servicio			= $inputs['tipo_servicio'];
		$inconsistencia->tipo_inconsistencia	= $inputs['tipo_inconsistencia'];
		$inconsistencia->fecha_incidente		= Carbon::now();
		$inconsistencia->otra_inconsistencia	= isset($inputs['otra_inconsistencia']) ? $inputs['otra_inconsistencia'] : null;
		$inconsistencia->no_orden	 			= $inputs['no_orden'] != '' ? $inputs['no_orden'] : null;
		$inconsistencia->codigo_tecnico			= trim($inputs['codigo_tecnico']) != '' ? trim($inputs['codigo_tecnico']) : null;
		$inconsistencia->estado					= $inputs['tipo_inconsistencia'] != 'Quitar Impedimentos' ? 'PENDIENTE' : 'ATENDIDO';
		$inconsistencia->fecha_creacion			= Carbon::now();
		$inconsistencia->periodo_creacion		= Carbon::now()->format('Ym');
		$inconsistencia->username_creacion		= $user_id;
		if($inputs['tipo_inconsistencia'] == 'Quitar Impedimentos') {
			$inconsistencia->fecha_atencion	= $inconsistencia->fecha_creacion;
			$inconsistencia->periodo_atencion = $inconsistencia->periodo_creacion;
			$inconsistencia->username_atencion = $inconsistencia->username_creacion;
		}
		$inconsistencia->save();
		return $inconsistencia->id;
	}
	
	public function update($inputs, $user_id)
	{
		$inconsistencia = $this->getById($inputs['id']);
		$inconsistencia->resolucion				= $inputs['resolucion'];
		$inconsistencia->accion					= $inputs['accion'];
		$inconsistencia->observaciones			= trim($inputs['observaciones']);
		$inconsistencia->estado					= 'ATENDIDO';
		$inconsistencia->fecha_atencion			= Carbon::now();
		$inconsistencia->periodo_atencion		= Carbon::now()->format('Ym');
		$inconsistencia->username_atencion		= $user_id;
		$inconsistencia->save();
		return $inconsistencia->id;
	}
	
	public function getUsersCanRegister() {
		$usernames = User::join('role_user', 'users.id', '=', 'role_user.user_id')
		->join('roles', 'role_user.role_id', '=', 'roles.id')
		->select(DB::raw('username, CONCAT(first_name, " ", last_name) as full_name'))
		->where('roles.name','=','operador')
		->orWhere('roles.name','=','operador_n2')
		->orWhere('roles.name','=','admin')
		->where('username', '!=', 'administrator')
		->get()
		->sortBy('full_name')
		->lists('full_name', 'username')
		->all();
			
		return array_merge(['all_users' => 'Todos los usuarios'], $usernames);
	}
	
	public function searchCases($option, $pattern) {
		$pattern = trim($pattern);
		
		$query = Inconsistencia::select(
			'id AS consecutivo',
			'fecha_atencion',
			'no_incidente',
			'tipo_servicio',
			'tipo_inconsistencia',
			'fecha_incidente',
			'no_orden',
			'username_creacion AS login_usuario'
		);
	
		switch ($option) {
			case 'no_incidente' : $filter = 'no_incidente'; break;
			case 'no_orden' 	: $filter = 'no_orden'; break;
		}
		if(!isset($filter)) return array();
			$query = $query->where($filter, 'LIKE','%' . $pattern . '%');
			$result = $query->limit(10)->get();
		return $result;
	}
	
	public function getServedReporting($begin_date, $end_date, $username) {
	
		$query = Inconsistencia::join('users AS u1', 'inconsistencias.username_creacion', '=', 'u1.username')
			->join('users AS u2', 'inconsistencias.username_atencion', '=', 'u2.username')
			->select(DB::raw(
				'inconsistencias.*, ' .
				'CONCAT(u1.first_name, " ", u1.last_name) as usuario_creacion, ' .
				'CONCAT(u2.first_name, " ", u2.last_name) as usuario_atencion'
			))
			->where('inconsistencias.fecha_atencion', '>=', $begin_date . ' 00:00:00')
			->where('inconsistencias.fecha_atencion', '<=', $end_date. ' 23:59:59')
			->where('inconsistencias.estado', '=', 'ATENDIDO');
				
		if($username != 'all_users') {
			$query = $query->where('inconsistencias.username_atencion', '=', $username);
		}
		
		return $query->get();
	}
	
	public function getPendingReporting() {
	
		$query = Inconsistencia::join('users', 'inconsistencias.username_creacion', '=', 'users.username')
		->select(DB::raw(
			'inconsistencias.*, ' .
			'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario'
		))
		->where('inconsistencias.estado', '=', 'PENDIENTE');
	
		return $query->get();
	}
}