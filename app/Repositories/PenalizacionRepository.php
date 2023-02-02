<?php 

namespace SSD\Repositories;

use DB;
use Carbon\Carbon;
use SSD\Models\Penalizacion;
use SSD\Models\Agente;
use SSD\User;

class PenalizacionRepository extends BaseRepository {

	public function __construct(Penalizacion $penalizacion)
	{
		$this->model = $penalizacion;
	}

	public function index($n)
	{
		return $this->model
		->latest()
		->paginate($n);
	}

	public function store($inputs, $user_id)
	{
		$penalizacion = new $this->model;
		$penalizacion->fecha_reporte	= $inputs['fecha_reporte'];
		$penalizacion->nivel			= $inputs['nivel'];
		$penalizacion->nombre_agente	= $inputs['nombre_agente'];
		$penalizacion->catalogo_auditoria = $inputs['catalogo_auditoria'];
		$penalizacion->aplicativo		= $inputs['aplicativo'];
		$penalizacion->tecnologia		= isset($inputs['tecnologia']) ? $inputs['tecnologia'] : null;
		$penalizacion->clasificacion_gestion	= $inputs['clasificacion_gestion'];
		$penalizacion->no_solicitud 	= isset($inputs['no_solicitud']) ? $inputs['no_solicitud'] : null;
		$penalizacion->mal_proceso		= $inputs['mal_proceso'];
		$penalizacion->observaciones	= trim($inputs['observaciones']);
		$penalizacion->fecha_atencion	= Carbon::now();
		$penalizacion->periodo			= Carbon::now()->format('Ym');
		$penalizacion->username			= $user_id;
		$penalizacion->save();
		return $penalizacion->id;
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
	
	public function getRegisterReporting($begin_date, $end_date, $username) {
	
		$query = Penalizacion::join('users', 'penalizaciones.username', '=', 'users.username')
			->select(DB::raw(
				'penalizaciones.*, ' .
				'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario'
			))
			->where('penalizaciones.fecha_atencion', '>=', $begin_date)
			->where('penalizaciones.fecha_atencion', '<=', $end_date);
				
		if($username != 'all_users') {
			$query = $query->where('penalizaciones.username', '=', $username);
		}
		
		return $query->get();
	}
	
	public function getAgents() {
		return Agente::all();	
	}
	
	public function getListAgents($level) {
		return Agente::select(DB::raw('nombre'))
			->where('es_visible','=', true)
			->where('nivel','=', $level)
			->orderBy('nombre')
			->get()
			->pluck('nombre');
	}
	
	public function storeAgent($inputs)
	{
		$agente = new Agente();
		$agente->nivel	= trim($inputs['nivel']);
		$agente->nombre	= trim($inputs['nombre']);
		$agente->es_visible	= true;
		$agente->save();
	}
	
	public function getAgentById($id)
	{
		return Agente::findOrFail($id);
	}
	
	public function updateAgent($inputs)
	{
		$agente = $this->getAgentById($inputs['id']);
		$agente->nivel	= $inputs['nivel'];
		$agente->nombre	= $inputs['nombre'];
		$agente->save();
		return $agente;
	}
	
	public function changeStatus($id)
	{
		$agente = $this->getAgentById($id);
		if($agente->es_visible) {
			$agente->es_visible = false;
		} else {
			$agente->es_visible = true;
		}
		$agente->save();
	}
}