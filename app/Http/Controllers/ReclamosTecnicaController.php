<?php 

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;
use SSD\Repositories\ReclamoTecnicaRepository;
use SSD\Http\Requests\ReclamoTecnicaRequest;
use SSD\Http\Requests\PutReclamoTecnicaRequest;


class ReclamosTecnicaController extends Controller {

	protected $nodo_saturado_gestion;
	
	protected $tipos_tecnicos = [
		//'INTERNO'		=> 'INTERNO',
		//'DISTRIBUIDOR'	=> 'DISTRIBUIDOR',
		//'CONTRATA'		=> 'CONTRATA',
		'DESPACHO'   	=> 'DESPACHO',
	];
	
	protected $tecnologias = [
		//'DIRECCION IP'	=> 'DIRECCION IP',
		'INTERNET GPON'	=> 'INTERNET GPON',
		'IPTV GPON'	    => 'IPTV GPON',
		'LINEA GPON'	=> 'LINEA GPON',
		'INTERNET ADSL'	=> 'INTERNET ADSL',
		'INTERNET HFC'	=> 'INTERNET HFC',
		'LINEA COBRE'	=> 'LINEA COBRE',
		'LINEA HFC'		=> 'LINEA HFC',
		'TV DTH'		=> 'TV DTH',
		'TV HFC'		=> 'TV HFC',
	];
	
	protected $causas_reclamos = [
		'FRAUDE'				=> 'FRAUDE',
		'MALA ATENCION TECNICO'	=> 'MALA ATENCION TECNICO',
		'MALA INSTALACION'		=> 'MALA INSTALACION',
		'MALA REPARACION'		=> 'MALA REPARACION',
		'VISITA FANTASMA'	    => 'VISITA FANTASMA',
		'PERSISTE LA FALLA'	    => 'PERSISTE LA FALLA',
		'MOVIMIENTO INFRAESTRUCTURA' => 'MOVIMIENTO INFRAESTRUCTURA',
		'AFECTADO POR HURACAN'    => 'AFECTADO POR HURACAN',
		'ROBO'					=> 'ROBO',
		'CAMBIO DE BASE APROVISIONAMIENTO'    => 'CAMBIO DE BASE APROVISIONAMIENTO',
		'SIN SEÑAL'	            => 'SIN SEÑAL',
		'RF INESTABLE'	        => 'RF INESTABLE',
		'LINEA SIN TONO'        => 	'LINEA SIN TONO',
		'CLIENTE REINCIDENTE'       => 	'CLIENTE REINCIDENTE',
		'ACTUALIZACION DE ELEMENTOS DE RED'  => 'ACTUALIZACION DE ELEMENTOS DE RED',	
	];
	
	public function __construct(ReclamoTecnicaRepository $reclamo_tecnica_gestion)
	{
		$this->reclamo_tecnica_gestion = $reclamo_tecnica_gestion;
		$this->middleware('auth');
		$this->middleware('role:admin', ['only' => ['getReporteAtendidos']]);
		$this->middleware('role:admin|operador', ['only' => ['getRegistro', 'postRegistro', 'getEditar', 'putEditar', 'getReportePendientes']]);
		$this->middleware('ajax', ['only' => ['getReclamosAtendidos', 'getReclamosPendientes']]);
	}

	public function getRegistro()
	{		
		$breadcrumb = [
				['name' => 'Reclamos Tecnica - Registro' ]
		];		
		
		return view('reclamos/registro')
			->with('page_title', 'Registro Casos Qflow')
			->with('navigation', 'reclamos')
			->with('breadcrumb', $breadcrumb)
			->with('tipos_tecnicos', $this->tipos_tecnicos)
			->with('tecnologias', $this->tecnologias)
			->with('causas_reclamos', $this->causas_reclamos);
	}
	
	public function postRegistro(ReclamoTecnicaRequest $request)
	{
		$this->reclamo_tecnica_gestion->store($request->all(), $request->user()->username);
		return redirect()->back()->with('success_message', 'Se ha registrado el caso correctamente.');
	}
	
	public function  getBuscar() {
		$breadcrumb = [
				['name' => 'Reclamos Tecnica - Búsqueda' ]
		];
	
		$opciones_busqueda = [
				'ticket'			=> 'Ticket',
				'id_solicitud'	 	=> 'ID Solicitud/Daño',
				'id_producto'		=> 'ID Producto',
		];
	
		return view('reclamos/buscar')
			->with('page_title', 'Reclamos Area Tecnica - Búsqueda')
			->with('navigation', 'reclamos')
			->with('breadcrumb', $breadcrumb)
			->with('opciones_busqueda', $opciones_busqueda);
	}
	
	public function getBuscarCasos(Request $request) {
		$inputs = $request->all();
		return response()->json($this->reclamo_tecnica_gestion->searchCases($inputs['opcion_busqueda'], $inputs['patron_busqueda']));
	}
	
	public function getMostrarCaso(Request $request) {
		$inputs = $request->all();
		return response()->json($this->reclamo_tecnica_gestion->getFullCase($inputs['ticket']));
	}
	
	public function getEditar($id) {
		$reclamo_tecnica = $this->reclamo_tecnica_gestion->getById($id);
	
		if($reclamo_tecnica->estado == 'ATENDIDO') {
			abort(403);
		}
	
		$breadcrumb = [
				['name' => 'Reclamos Tecnica - Edición' ]
		];
	
		return view('reclamos/editar', $reclamo_tecnica)
			->with('page_title', 'Reclamos Area Tecnica - Actualizar Caso')
			->with('navigation', 'reclamos')
			->with('breadcrumb', $breadcrumb)
			->with('tipos_tecnicos', $this->tipos_tecnicos)
			->with('tecnologias', $this->tecnologias)
			->with('causas_reclamos', $this->causas_reclamos);
	}
	
	public function putEditar(PutReclamoTecnicaRequest $request) {
		$reclamo_tecnica = $this->reclamo_tecnica_gestion->update($request->all(), $request->user()->username);
	
	/*	if($nodo_saturado->estado == 'ATENDIDO')
			$mensaje = 'Se ha actualizado y cerrado el Caso No. '. $request->input('consecutivo') . ' correctamente.';
		else
	*/		$mensaje = 'Se ha actualizado el Caso No. '. $request->input('ticket') . ' correctamente.';
				
		return redirect('reclamos/reporte-pendientes')
			->with('success_message', $mensaje);
	}
	
	public function getReporteAtendidos() {
		$breadcrumb = [
				['name' => 'Reclamos Tecnica - Casos Atendidos' ]
		];
	
		$usernames = $this->reclamo_tecnica_gestion->getUsersCanRegister();
			
		return view('reclamos/reporte_atendidos')
			->with('page_title', 'Reclamos Area Tecnica - Reporte de Casos Atendidos')
			->with('navigation', 'reclamos')
			->with('breadcrumb', $breadcrumb)
			->with('usernames', $usernames);
	}
	
	public function getReclamosAtendidos(Request $request)
	{
		$inputs = $request->all();
		if($inputs['fecha_inicial'] != null & $inputs['fecha_final'] != null)
			return response()->json($this->reclamo_tecnica_gestion->getServedReporting($inputs['fecha_inicial'], $inputs['fecha_final'], $inputs['username']));
		else
			return response()->json();
	}
	
	public function getReportePendientes() {
		$breadcrumb = [
				['name' => 'Reclamos Tecnica - Casos Pendientes' ]
		];
	
		return view('reclamos/reporte_pendientes')
			->with('page_title', 'Reclamos Area Tecnica - Reporte de Casos Pendientes')
			->with('navigation', 'reclamos')
			->with('breadcrumb', $breadcrumb);
	}
	
	public function getReclamosPendientes(Request $request)
	{
		return response()->json($this->reclamo_tecnica_gestion->getPendingReporting());
	}
}