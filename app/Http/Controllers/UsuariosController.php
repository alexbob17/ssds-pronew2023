<?php 

namespace SSD\Http\Controllers;

use SSD\Repositories\UsuarioRepository;
use SSD\Http\Requests\UsuarioRequest;
use SSD\Http\Requests\PutUsuarioRequest;


class UsuariosController extends Controller {

	protected $usuario_gestion;
	
	public function __construct(UsuarioRepository $usuario_gestion)
	{
		$this->usuario_gestion = $usuario_gestion;
		$this->middleware('auth');
	}
	
	public function getIndex()
	{
		$breadcrumb = [
				['name' => 'Configuración - Usuarios' ]
		];
	
		return view('usuarios/administrar')
			->with('page_title', 'ADMINISTRAR USUARIOS')
			->with('navigation', 'configuracion')
			->with('breadcrumb', $breadcrumb)
			->with('usuarios', $this->usuario_gestion->getUsuarios());
	}
	
	public function getResetearContrasena($id, $hash_reset) {
		if( $this->usuario_gestion->validarHashReset($id, $hash_reset)) {
			$password = env('PASS_RESET', '12345678');
			$usuario = $this->usuario_gestion->actualizarContrasena($id, $password);
			return redirect()->back()->with('success_message', 'La contraseña del usuario "'. $usuario->username .'" ha sido reseteada, la nueva contraseña es "'. $password . '"');
		} else {
			abort(404);
		}
	}

	public function getActivarCuenta($id, $hash_reset) {
		if( $this->usuario_gestion->validarHashReset($id, $hash_reset)) {
			$usuario = $this->usuario_gestion->activarCuenta($id);
			return redirect()->back()->with('success_message', 'La cuenta "'. $usuario->username .'" ha sido activada.');
		} else {
			abort(404);
		}
	}
	
	public function getDesactivarCuenta($id, $hash_reset) {
		if( $this->usuario_gestion->validarHashReset($id, $hash_reset)) {
			$usuario = $this->usuario_gestion->desactivarCuenta($id);
			return redirect()->back()->with('success_message', 'La cuenta "'. $usuario->username .'" ha sido desactivada.');
		} else {
			abort(404);
		}
	}
	
	public function getRegistro()
	{
		$breadcrumb = [
				['route' => 'usuarios', 'name' => 'Configuración - Usuarios'],
				['name' => 'Registro' ]
		];
	
		return view('usuarios/registro')
			->with('page_title', 'REGISTRO DE USUARIOS')
			->with('navigation', 'configuracion')
			->with('breadcrumb', $breadcrumb)
			->with('roles', $this->usuario_gestion->getRoles());
	}
	
	public function postRegistro(UsuarioRequest $request)
	{
		$this->usuario_gestion->guardar($request->all());
		return redirect()->back()->with('success_message', 'Se ha registrado el usuario correctamente.');
	}
	
	public function getEditar($id)
	{
		$usuario = $this->usuario_gestion->getById($id);
		
		$breadcrumb = [
				['route' => 'usuarios', 'name' => 'Configuración - Usuarios'],
				['name' => 'Editar' ]
		];
				
		return view('usuarios/editar', $usuario)
			->with('page_title', 'EDICIÓN DE USUARIOS')
			->with('navigation', 'configuracion')
			->with('breadcrumb', $breadcrumb)
			->with('roles', $this->usuario_gestion->getRoles())
			->with('role', $usuario->roles[0]->id);
	}
	
	public function putEditar(PutUsuarioRequest $request) {
		$inputs = $request->all();
	
		$usuario = $this->usuario_gestion->actualizar($request->all());
	
		return redirect('usuarios')
			->with('success_message', 'Se ha actualizado los datos del usuario "' . $usuario->username . ' " correctamente.');
	}
}