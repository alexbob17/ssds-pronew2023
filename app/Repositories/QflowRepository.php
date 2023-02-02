<?php 

namespace SSD\Repositories;

use DB;
use Carbon\Carbon;
use SSD\Models\Qflow;
use SSD\Models\Tienda;
use SSD\User;


class QflowRepository extends BaseRepository {

	public function __construct(Qflow $qflow)
	{
		$this->model = $qflow;
	}

	public function index($n)
	{
		return $this->model
		->latest()
		->paginate($n);
	}

	public function store($inputs, $user_id)
	{
		$qflow = new $this->model;
		$qflow->no_caso_qflow	= $inputs['no_caso_qflow'];
		$qflow->fecha_registro	= $inputs['fecha_registro'];
		$qflow->fecha_recibido	= $inputs['fecha_recibido'];
		$qflow->asesor			= trim($inputs['asesor']);
		$qflow->id_tienda		= $inputs['id_tienda'];
		$qflow->tipo_servicio	= $inputs['tipo_servicio'];
		$qflow->no_producto		= $inputs['no_producto'];
		$qflow->no_dano_solicitud	= $inputs['no_dano_solicitud'];
		$qflow->tipologia		= $inputs['tipologia'];
		$qflow->workflow		= $inputs['workflow'];
		$qflow->medio_ingreso	= $inputs['medio_ingreso'];
		$qflow->tipo_caso		= $inputs['tipo_caso'];
		$qflow->observaciones	= trim($inputs['observaciones']);
		$qflow->fecha_creacion	= Carbon::now();
		$qflow->periodo = Carbon::now()->format('Ym');
		$qflow->username = $user_id;
		$qflow->dias_dilacion = Carbon::parse($qflow->fecha_recibido)->diffInDays(Carbon::parse($qflow->fecha_registro));
		$qflow->save();
		return $qflow->id;
	}
	
	public function getTiendas() {
		return Tienda::where('es_visible','=', true)->get()
		->sortBy('nombre')
		->lists('nombre', 'id');
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
	
		$query = Qflow::join('users', 'qflows.username', '=', 'users.username')
			->join('tiendas', 'qflows.id_tienda', '=', 'tiendas.id', 'left outer')
			->select(DB::raw(
				'qflows.id AS consecutivo, ' .
				'qflows.no_caso_qflow, ' .
				'qflows.fecha_registro, ' .
				'qflows.fecha_recibido, ' .
				'qflows.fecha_creacion, ' .
				'tiendas.nombre AS tienda, ' .
				'qflows.asesor, ' .
				'qflows.tipo_servicio, ' .
				'qflows.no_producto, ' .
				'qflows.no_dano_solicitud, ' .
				'qflows.tipologia, ' .
				'qflows.workflow, ' .
				'qflows.medio_ingreso, ' .
				'qflows.tipo_caso, ' .
				'qflows.dias_dilacion, ' .
				'qflows.username AS login, ' .
				'CONCAT(users.first_name, " ", users.last_name) as nombre_usuario, ' .
				'qflows.observaciones '
			))
			->where('qflows.fecha_creacion', '>=', $begin_date)
			->where('qflows.fecha_creacion', '<=', $end_date);
			
		if($username != 'all_users') {
			$query = $query->where('qflows.username', '=', $username);
		}
		return $query->get();
	}
}