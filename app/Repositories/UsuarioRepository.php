<?php 

namespace SSD\Repositories;

use SSD\User;
use SSD\Role;

class UsuarioRepository extends BaseRepository {

	public function __construct(User $usuario) { 
		$this->model = $usuario;
	}
	
	public function guardar($inputs)
	{
		$usuario = new $this->model;
		$usuario->username 				= trim($inputs['username']);
		$usuario->email	 				= trim($inputs['email']);
		$usuario->first_name			= trim($inputs['first_name']);
		$usuario->last_name				= trim($inputs['last_name']);
		$usuario->organizational_area	= trim($inputs['organizational_area']);
		$usuario->password				= bcrypt($inputs['password']);
		$usuario->hash_reset			= md5($inputs['password'] . time());
		$usuario->save();
		$role = Role::findOrFail($inputs['role']);
		$usuario->attachRole($role);
		return $usuario->id;
	}
	
	public function actualizar($inputs)
	{
		$usuario = $this->getById($inputs['id']);	
		$usuario->email	 				= trim($inputs['email']);
		$usuario->first_name			= trim($inputs['first_name']);
		$usuario->last_name				= trim($inputs['last_name']);
		$usuario->organizational_area	= trim($inputs['organizational_area']);
		$usuario->save();
		
		if(isset($inputs['role'])) {
			$usuario->detachRoles($usuario->roles);
			$role = Role::findOrFail($inputs['role']);
			$usuario->attachRole($role);
		}
		
		return $usuario;
	}
	
	
	public function getUsuarios() {
		$query = User::with('roles')->select(
				'id',
				'username AS login',
				'first_name AS nombres',
				'last_name AS apellidos',
				'email',
				'organizational_area AS area_organizacional',
				'is_activated AS estado',
				'created_at AS fecha_creacion',
				'updated_at AS ultima_modificacion',
				'hash_reset'
			)
			->where('username', '!=', 'administrator');
		
		$result = $query->get();
			
		foreach ($result as $row) {
			$row['estado']	= $row['estado'] == true ?	$row['estado']	= "Activo" : $row['estado']	= "Inactivo";
			$row['permisos']  = $row['roles']->implode('display_name', ', ');
			unset($row['roles']);
		}
		return $result;
	}
	
	public function getRoles() {
		return Role::select('id', 'display_name')->get()
		->sortBy('display_name')
		->lists('display_name', 'id');
	}
	
	public function validarHashReset($id, $hash_reset) {
		return User::findOrFail($id)->hash_reset == $hash_reset;
	}
	
	public function actualizarContrasena($id, $password) {
		$usuario = User::findOrFail($id);
		$usuario->password = bcrypt($password);
		$usuario->hash_reset = md5($usuario->password . time());
		$usuario->save();
		return $usuario;
	}
	
	public function activarCuenta($id) {
		$usuario = User::findOrFail($id);
		$usuario->is_activated = true;
		$usuario->save();
		return $usuario;
	}
	
	public function desactivarCuenta($id) {
		$usuario = User::findOrFail($id);
		$usuario->is_activated = false;
		$usuario->save();
		return $usuario;
	}
}