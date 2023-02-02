<?php 

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;
use SSD\Http\Requests\QflowRequest;
use SSD\Repositories\QflowRepository;


class QflowsController extends Controller {

	protected $qflow_gestion;
	
	protected $tipos_servicio = [
		'DIRECCION IP'		=> 'DIRECCION IP', 
		'E1' => 'E1',	
		'INTERNET ADSL'		=> 'INTERNET ADSL',
		'INTERNET HFC'		=> 'INTERNET HFC',
		'LINEA COBRE'		=> 'LINEA COBRE',
		'LINEA HFC'			=> 'LINEA HFC',
		'TV DTH'			=> 'TV DTH',
		'TV HFC'			=> 'TV HFC',
		'TRANSMISION DE DATOS' => 'TRANSMISION DE DATOS',
		'INTERNET GPON'      => 'INTERNET GPON',
		'IPTV'              => 'IPTV',
		'LINEA GPON'        => 'LINEA GPON',
	];

protected $tipologias_improcedentes = [
		'Cliente suspendido',
		'Gestión por trámites posventa',
		'No aplica a traslado sino a daño',
		'No aplica a traslado sino cambio de dirección sobre producto',
		'Sin datos - daños/solicitud, nombre, contrato...',
		'Derivado a despacho en bandeja incorrecta',
		'no registraron daño/solicitud e informacion, soporte',
		'No aplica a despacho RX @,tv digital,dth y linea',
		'Daño/solicitud mal registrada',
		'No registraron solicitud de venta',
		'Otros'
	];
	
	protected $tipologias_procedentes = [
		'Adición de equipo',
		'Averías',
		'Cambio base de aprovisionamiento: Digial a Análogo',
		'Cambio base de aprovisionamiento: Análogo a Digital',
		'Cambio de dirección',
		'Cambio de equipo: Cortesía',
		'Cambio de equipo: Renovación de contrato',
		'Corte injustificado',
		'Cliente sin soporte',
		'Cliente suspendido',
		'Excedente de metraje',
		'Factibilidades',
		'Falla masiva',
		'Gestión por trámites de posventa',
		'Grilla de canales',
		'Infundado',
		'Inspección',
		'Instalación',
		'Mala atención técníca',
		'Mala venta',
		'Migración',
		'Movimiento de poste',
		'Nodo saturado',
		'Otros',
		'Posible fraude',
		'Reincidente',
		'Retiro',
		'Reubicación de acometida',
		'Tensado de acometida',
		'Traslado',
		'Visita fantasma',
	];
	
	protected $tipos_casos = [
		'PROCEDENTE'	=> 'PROCEDENTE',
		'IMPROCEDENTE'	=> 'IMPROCEDENTE',
	];
	
	protected $workflow = [
		'Avería crítica'				=> 'Avería crítica',
		'Avería VIP'					=> 'Avería VIP',
		'Tensar cable'					=> 'Tensar cable',
		'Movimienteo Infraestructura'	=> 'Movimienteo infraestructura',
		'Reconexión plazo vencido'		=> 'Reconexión plazo vencido',
		'Avería nueva en instalación'	=> 'Avería nueva en instalación',
		'Reposición de equipo'			=> 'Reposición de equipo',
		'Mala atención por área técnica'=> 'Mala atención por área técnica',
		'Soporte técnico'				=> 'Soporte técnico',	
	];
	
	protected $medios_ingreso = [
		'Cliente@'			=> 'Cliente@',
		'Corporativo'		=> 'Corporativo',
		'Despacho Nivel II'	=> 'Despacho Nivel II',
		'Facebook - Twitter'=> 'Facebok - Twitter',
		'Multiskill Fijos'	=> 'Multiskill Fijos',
		'Web Service'		=> 'Web Service',
	];
	
	public function __construct(QflowRepository $qflow_gestion)
	{
		$this->qflow_gestion = $qflow_gestion;
		$this->middleware('auth');
		$this->middleware('role:admin', ['only' => ['getReporteAtendidos']]);
		$this->middleware('role:admin|operador', ['only' => ['getRegistro', 'postRegistro']]);
		$this->middleware('ajax', ['only' => ['getQflowsAtendidos']]);
	}

	public function getRegistro()
	{		
		$breadcrumb = [
				['name' => 'Qflow - Registro' ]
		];		
		
		
		$tipologias = [];
		if (old('tipo_caso')) {
			if(old('tipo_caso') == 'PROCEDENTE') {
				$seleccion = $this->tipologias_procedentes;
			} else if(old('nivel') == 'IMPROCEDENTE') {
				$seleccion = $this->tipologias_improcedentes;
			}
			foreach ($seleccion as $sel) {
				$tipologias[$sel] = $sel;
			}	
		}
		
		return view('qflows/registro')
			->with('page_title', 'Qflow - Registro de Casos')
			->with('navigation', 'qflows')
			->with('breadcrumb', $breadcrumb)
			->with('tiendas', $this->qflow_gestion->getTiendas())
			->with('tipos_servicio', $this->tipos_servicio)
			->with('tipologias', $tipologias)
			->with('tipos_casos', $this->tipos_casos)
			->with('workflow', $this->workflow)
			->with('medios_ingreso', $this->medios_ingreso);
	}
	
	public function postRegistro(QflowRequest $request)
	{
		$this->qflow_gestion->store($request->all(), $request->user()->username);
		return redirect()->back()->with('success_message', 'Se ha registrado el caso correctamente.');
	}
	
	public function getTipologias(Request $request)
	{
		$inputs = $request->all();
		if($inputs['tipo_caso'] == 'PROCEDENTE') {
			$response = $this->tipologias_procedentes;
		} else if($inputs['tipo_caso'] == 'IMPROCEDENTE') {
			$response = $this->tipologias_improcedentes;
		} else {
			$response = array();
		}
		return response()->json($response);
	}
	
	public function getReporteAtendidos() {
		$breadcrumb = [
				['name' => 'Casos Atendidos' ]
		];
	
		$usernames = $this->qflow_gestion->getUsersCanRegister();
			
		return view('qflows/reporte_atendidos')
		->with('page_title', 'Qflows - Reporte de Casos Atendidos')
		->with('navigation', 'qflows')
		->with('breadcrumb', $breadcrumb)
		->with('usernames', $usernames);
	}
	
	public function getQflowsAtendidos(Request $request)
	{
		$inputs = $request->all();
		if($inputs['fecha_inicial'] != null & $inputs['fecha_final'] != null)
			return response()->json($this->qflow_gestion->getServedReporting($inputs['fecha_inicial'], $inputs['fecha_final'], $inputs['username']));
		else
			return response()->json();
	}
}