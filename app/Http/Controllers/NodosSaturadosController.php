<?php 

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;
use SSD\Http\Requests\NodoSaturadoRequest;
use SSD\Repositories\NodoSaturadoRepository;
//use SSD\Repositories\NodoSaturadoRepository;


class NodosSaturadosController extends Controller {

	protected $nodo_saturado_gestion;
	
	protected $estados = [
		'Acepta Cambio Tecnología'						=> 'Acepta Cambio Tecnología',
		'Migrado a Red Digital'							=> 'Migrado a Red Digital',
		'No Acepta Cambio'								=> 'No Acepta Cambio',
		'Orden para Trómite de Cambio Tecnología'		=> 'Orden para Trámite de Cambio Tecnología',
		'Para Gestión de Trámite'						=> 'Para Gestión de Trámite',
		'Retira los Servicios'							=> 'Retira los Servicios',
		'Sin Posibilidad Técnica para brindar servicio'	=> 'Sin Posibilidad Técnica para brindar servicio',
		'Solucionado a nivel NOC-Planta Interna'		=> 'Solucionado a nivel NOC-Planta Interna',
		'Ya se encontró navegando'						=> 'Ya se encontró navegando',	
	];
	
	public function __construct(NodoSaturadoRepository $nodo_saturado_gestion)
	{
		$this->nodo_saturado_gestion = $nodo_saturado_gestion;
		$this->middleware('auth');
		$this->middleware('role:admin|operador', ['only' => ['getReporteAtendidos', 'getReportePendientes']]);
		$this->middleware('role:admin|operador', ['only' => ['getRegistro', 'postRegistro', 'getEditar', 'putEditar']]);
		$this->middleware('ajax', ['only' => ['getNodosAtendidos', 'getNodosPendientes']]);
	}

	public function getRegistro()
	{		
		$breadcrumb = [
				['name' => 'Nodo Saturado - Registro' ]
		];		
		
		return view('nodos/registro')
			->with('page_title', 'Nodos Saturados - Registro de Casos')
			->with('navigation', 'nodos')
			->with('breadcrumb', $breadcrumb)
			->with('estados', $this->estados);
	}
	
	public function postRegistro(NodoSaturadoRequest $request)
	{
		$this->nodo_saturado_gestion->store($request->all(), $request->user()->username);
		return redirect()->back()->with('success_message', 'Se ha registrado el caso correctamente.');
	}
	
	public function getEditar($id) {
		$nodo_saturado = $this->nodo_saturado_gestion->getById($id);
	
		if($nodo_saturado->estado == 'ATENDIDO') {
			abort(403);
		}
	
		$breadcrumb = [
				['name' => 'Edición' ]
		];
	
		return view('nodos/editar', $nodo_saturado)
			->with('page_title', 'Nodos Saturados - Actualizar Caso')
			->with('navigation', 'nodos')
			->with('breadcrumb', $breadcrumb)
			->with('estados', $this->estados);
	}
	
	public function putEditar(NodoSaturadoRequest $request) {
		$nodo_saturado = $this->nodo_saturado_gestion->update($request->all(), $request->user()->username);
	
		if($nodo_saturado->estado == 'ATENDIDO')
			$mensaje = 'Se ha actualizado y cerrado el Caso No. '. $request->input('consecutivo') . ' correctamente.';
		else
			$mensaje = 'Se ha actualizado el Caso No. '. $request->input('consecutivo') . ' correctamente.';
				
		return redirect('nodos/reporte-pendientes')
			->with('success_message', $mensaje);
	}
	
	public function getReporteAtendidos() {
		$breadcrumb = [
				['name' => 'Casos Atendidos' ]
		];
	
		$usernames = $this->nodo_saturado_gestion->getUsersCanRegister();
			
		return view('nodos/reporte_atendidos')
		->with('page_title', 'Nodos Saturados - Reporte de Casos Atendidos')
		->with('navigation', 'nodos')
		->with('breadcrumb', $breadcrumb)
		->with('usernames', $usernames);
	}
	
	public function getNodosAtendidos(Request $request)
	{
		$inputs = $request->all();
		if($inputs['fecha_inicial'] != null & $inputs['fecha_final'] != null)
			return response()->json($this->nodo_saturado_gestion->getServedReporting($inputs['fecha_inicial'], $inputs['fecha_final'], $inputs['username']));
		else
			return response()->json();
	}
	
	public function getReportePendientes() {
		$breadcrumb = [
				['name' => 'Casos Pendientes' ]
		];
	
		$usernames = $this->nodo_saturado_gestion->getUsersCanRegister();
			
		return view('nodos/reporte_pendientes')
			->with('page_title', 'Nodos Saturados - Reporte de Casos Pendientes')
			->with('navigation', 'nodos')
			->with('breadcrumb', $breadcrumb)
			->with('usernames', $usernames);
	}
	
	public function getNodosPendientes(Request $request)
	{
		return response()->json($this->nodo_saturado_gestion->getPendingReporting());
	}
}