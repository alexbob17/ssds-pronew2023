<?php 

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;
use SSD\Http\Requests\InconsistenciaRequest;
use SSD\Http\Requests\PutInconsistenciaRequest;
use SSD\Repositories\InconsistenciaRepository;


class InconsistenciasController extends Controller {

	protected $inconsistencia_gestion;
	
	protected $catalogo_auditorias = [
			'Servicio' 		=> 'Servicio', 
			'Aplicativo' 	=> 'Aplicativo',
	];
	
	protected $tipos_servicios = [
			'TV DTH',
			'TV HFC',
			'LINEA COBRE',
			'LINEA HFC',
			'INTERNET ADSL',
			'INTERNET HFC',
			'GPON',
			'TXRX',
			'RX',		
	];
	
	protected $tipos_aplicativos = [
			'OPEN',
			'ETA',
			'AXIROS',
			'WEB',
			'SAP SINERGIA',
			'MA-SAP',
			'GECODE',
			'DOMINIO',
			'IVR',
	];
	
	protected $inconsistencias = [
			//'Anular Cambio de Equipo STB/DTA/SMC/Módem'		=> 'Anular Cambio de Equipo STB/DTA/SMC/Módem',/
			//'Anular Cambio de Equipo y Liberar STB/DTA/SMC/Módem'	=> 'Anular Cambio de Equipo y Liberar STB/DTA/SMC/Módem',
			//'Anular Solicitud de Venta/Postventa/Migración'	=> 'Anular Solicitud de Venta/Postventa/Migración',
			'Aprovisionar  STB/DTA/SMC'						=> 'Aprovisionar  STB/DTA/SMC',
			'Aprovisionar Línea HFC'					    => 'Aprovisionar Línea HFC',
			'Aprovisionar Modem HFC'					    => 'Aprovisionar Modem HFC',
			'Aprovisionar Velocidad AXIROS'					=> 'Aprovisionar Velocidad AXIROS',
			'Aprovisionar de paquete de canales GPON'		=> 	'Aprovisionar de paquete de canales GPON',
			//'Desbloqueo de Usuario'							=> 'Desbloqueo de Usuario',
			//'Error Elementos no Asignable'					=> 'Error Elementos no Asignable',
			//'Error No existe equivalencia configurada para crear Migración'	=> 'Error No existe equivalencia configurada para crear Migración',
			//'Error Venta Internet'							=> 'Error Venta Internet',
			'Inconsistencia en Paquete de Canales'			=> 'Inconsistencia en Paquete de Canales',
			'No Cambia de Estado la Solicitud'				=> 'No Cambia de Estado la Solicitud',
			'Liberar STB/SMC -DTH'							=> 'Liberar STB/SMC -DTH',
			'No Genera órdenes en ORCAO'					=> 'No Genera órdenes en ORCAO',
			'No Permite Asignar Elementos'					=> 'No Permite Asignar Elementos',
			'ORCAO - Estado 3 asignación asistida'			=> 'ORCAO - Estado 3 asignación asistida',
			'Orden en Estado 14'							=> 'Orden en Estado 14',
			//'Orden para Generación Asistida'				=> 'Orden para Generación Asistida',
			'Ordenes Cíclicas'								=> 'Ordenes Cíclicas',
			'Suspendido en AXIROS'							=> 'Suspendido en AXIROS',
			//'Quitar Impedimentos'  							=> 'Quitar Impedimentos',
			//'Caída Momentánea de Syreng'  					=> 'Caída Momentánea de Syreng',
			//'Estamos sin Syreng'  							=> 'Estamos sin Syreng',
			//'Estamos sin Gecode'  							=> 'Estamos sin Gecode',
			//'No caen los MSJ de Syreng' 					=> 'No caen los MSJ de Syreng',
			//'Error de Msj en App Syreng' 					=> 'Error de Msj en App Syreng',
			//'Lentitud en las Gestiones de Syreng' 			=> 'Lentitud en las Gestiones de Syreng',
			//'No caen las ordenes en ETA' 					=> 'No caen las ordenes en ETA',
			//'Msj de Gecode no están Cayendo'				=> 'Msj de Gecode no están Cayendo',
			'Lentitud en OPEN' 								=> 'Lentitud en OPEN',
			//'ST – Corrección de Coordenadas' 				=> 'ST – Corrección de Coordenadas',
			//'ST – Corrección de Cita Cumplidas' 			=> 'ST – Corrección de Cita Cumplidas',
			//'ST – Corrección de Fecha y Hora' 				=> 'ST – Corrección de Fecha y Hora',
			//'ST – Códigos de Liquidación' 					=> 'ST – Códigos de Liquidación',
			//'ST – Cambio de Base y Aprovisionamiento' 		=> 'ST – Cambio de Base y Aprovisionamiento',
			//'ST – Corrección de Clase de Servicio' 			=> 'ST – Corrección de Clase de Servicio',
			//'ST – Cambio de Módem Dedicado' 				=> 'ST – Cambio de Módem Dedicado',
			//'ST – Corrección Campo “Personal”' 				=> 'ST – Corrección Campo “Personal”',
			//'Perdida de Enlace en CIC' 						=> 'Perdida de Enlace en CIC',
			//'Reporte de Venta/Daño/RX/Impedimentos' 		=> 'Reporte de Venta/Daño/RX/Impedimentos',
			//'Modificaciones ST/RF'							=> 'Modificaciones ST/RF',
			'Correo electronico Gpon'			         	=> 'Correo electronico Gpon',
			'Solicitud en estado 9 Gpon'			         => 'Solicitud en estado 9 Gpon',
			'Solicitud en estado 9'                         =>	'Solicitud en estado 9',

			'Otros'											=> 'Otros',
	];	
	
	protected $resoluciones = [
			'CORRECTO'	=> 'CORRECTO',
			'INCORRECTO'	=> 'INCORRECTO',
	];
	
	protected $accion_correcta = [
			//'Se Anula Cambio de Equipo con Éxito',
			//'Se Anula Solicitud y se libera equipo con Éxito',
			//'Anulación Efectuada con Éxito',
			'Equipos STB/DTA/SMC Aprovisionado',
			'Servicio de Internet aprovisionado',
			'Servicio de Voip aprovisionado',
			'Velocidad Actualizada en AXIROS',
			//'Coordenadas Actualizadas',
			//'Cita Cumplida Actualizada',
			//'Fecha y Hora Actualizada',
			//'Cambio de B.A Actualizada',
			//'Cambio de B.A y Aprovisionamiento con Éxito',
		//	'Clase de Servicio Actualizado',
			//'Módem Dedicado Actualizado OPEN + AXIROS',
			//'Código de Contrata/Distribuidor/Internos Actualizado',
			//'Se procedió con Desbloqueo de usuario',
			'Inconsistencia  superada en ORCAO',
			//'Se corrige Inconsistencia, Registrar Migración',
			'Aprovisionamiento de Paquete de Canales/Correo',
			'Equipos y Canales Aprovisionados',
			'Equipo Liberados STB/DTA/SMC/Módem',
			'Solicitud Cambió de Estado',
			'Ya genero Ordenes de Trabajo',
			'Correo mal registrado/ya en uso',
			'Inconsistencia  superada en IMPAS',
			'Inconsistencia en Estado 13 superada-ORCAO',
			'Se reprocesado orden en Estado 14 @/Voip',
			'Se reprocesado orden en Estado 14 TV',
			'Se reprocesado orden en Estado 9 GPON',
			'Inconsistencia  superada en P. Único',
			'Inconsistencia con Orden Cíclica superada',
			'Falla Superada por Aprovisionamiento de STB/SMC/Modem',
			//'Se actualiza Estado de Servicio en AXIROS',
			'Falla DTH Escalado con Región fue Superada',
			'Error de Elementos asignable Superado',
			//'Inconsistencia en Venta de Internet Superada',
			//'Falla en Syreng Superada',
			//'Falla en Gecode Superada',
			//'Falla en ETA Superada',
			'Lentitud en Open fue Superada',
			//'Falla en SAP SINERGIA Superada',
			//'Falla en MA-SAP Superada',
			//'Falla en WEB Superada',
			//'Falla en IVR Superada',
			'Otros',
	];
	
	protected $accion_incorrecta = [
			'Incidente por Estado 14 en TV HFC NO APLICA',
			'Incidente con Impedimento NO APLICA',
			'No valido Producto Base',
			'No aplicaba para incidente',
			'Múltiples Incidentes',
			'Incidente Mal Documentado',
			'Incidente sin Adjunto',
			'No valido en IMPAS proceso de Asig. Elementos de RED',
			'Duplico Incidente',
			'Módem no aparece en AXIROS',
			'Debió Reprocesar orden, luego hacer Cambio de Equipo',
			'Incidente por Refresh NO APLICA',
			'Caso fue Mal Direccionado',
			'Incidente por Ordenes Cíclicas No aplica',
			'Anulación para migración NO APLICA',
			'Canales no están dentro de los paquetes contratados',
			'Refresh NO APLICA en ciclo de Facturación',
			'Debió solicitar Traslado de Voip',
			'Otros',
	];
	
	public function __construct(InconsistenciaRepository $incosistencia_gestion)
	{
		$this->inconsistencia_gestion = $incosistencia_gestion;
		$this->middleware('auth');
		$this->middleware('role:admin|operador', ['only' => ['getRegistro', 'postRegistro']]);
		$this->middleware('role:admin', ['only' => ['getReportes', 'getReporteAtendidos']]);
		//$this->middleware('ajax', ['only' => ['getInconsistenciasAtendidas', 'getBuscarCasos']]);
	}

	public function getRegistro()
	{		
		$breadcrumb = [
				['name' => 'Inconsistencias - Registro' ]
		];		
		
		$tipos_servicios = [];
		if(old('catalogo_auditoria')) {
			$tipos_servicios = $this->getDataTiposServicios(old('catalogo_auditoria'));
			$tipos_servicios = array_combine($tipos_servicios, $tipos_servicios);
		}
		
		return view('inconsistencias/registro')
			->with('page_title', 'Inconsistencias - Registro de Casos')
			->with('navigation', 'inconsistencias')
			->with('catalogo_auditorias', $this->catalogo_auditorias)
			->with('tipos_servicios', $tipos_servicios)
			->with('inconsistencias', $this->inconsistencias)
			->with('breadcrumb', $breadcrumb);
	}
	
	private function getDataTiposServicios($catalogo) {
		switch($catalogo) {
			case 'Servicio' : return $this->tipos_servicios; break;
			case 'Aplicativo' : return $this->tipos_aplicativos; break;
			default: return array();
		}
	}
	
	public function getTiposServicios(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataTiposServicios($inputs['catalogo']);
		return response()->json($response);
	}
	
	public function postRegistro(InconsistenciaRequest $request)
	{
		$this->inconsistencia_gestion->store($request->all(), $request->user()->username);
		return redirect()->back()->with('success_message', 'Se ha registrado el caso correctamente.');
	}
	
	public function  getBuscar() {
		$breadcrumb = [
				['name' => 'Inconsistencias - Búsqueda' ]
		];
	
		$opciones_busqueda = [
				'no_incidente'	=> 'No. Indicente',
				'no_orden'		=> 'Soliictud/Daño/Producto',
		];
	
		return view('inconsistencias/buscar')
			->with('page_title', 'Inconsistencias - Búsqueda de Casos')
			->with('navigation', 'inconsistencias')
			->with('opciones_busqueda', $opciones_busqueda)
			->with('breadcrumb', $breadcrumb);
	}
	
	public function getBuscarCasos(Request $request) {
		$inputs = $request->all();
		return response()->json($this->inconsistencia_gestion->searchCases($inputs['opcion_busqueda'], $inputs['patron_busqueda']));
	}
	
	public function getReporteAtendidos() {
		$breadcrumb = [
				['name' => 'Inconsistencias - Reporte Atendidos' ]
		];
	
		$usernames = $this->inconsistencia_gestion->getUsersCanRegister();
			
		return view('inconsistencias/reporte_atendidos')
			->with('page_title', 'Inconsistencias - Reporte de Casos Atendidos')
			->with('navigation', 'inconsistencias')
			->with('breadcrumb', $breadcrumb)
			->with('usernames', $usernames);
	}
	
	public function getInconsistenciasAtendidas(Request $request)
	{
		$inputs = $request->all();
		if($inputs['fecha_inicial'] != null & $inputs['fecha_final'] != null)
			return response()->json($this->inconsistencia_gestion->getServedReporting($inputs['fecha_inicial'], $inputs['fecha_final'], $inputs['username']));
		else
			return response()->json();
	}
	
	public function getMostrarCaso(Request $request) {
		$inputs = $request->all();
		//return response()->json($this->caso_distribuidor_gestion->getFullCase($inputs['id_caso']));
		return response()->json([]);
	}
	
	public function getReportePendientes() {
		$breadcrumb = [
				['name' => 'Inconsistencias - Reporte Pendientes' ]
		];
	
		return view('inconsistencias/reporte_pendientes')
			->with('page_title', 'Inconsistencias - Reporte de Casos Pendientes')
			->with('navigation', 'inconsistencias')
			->with('breadcrumb', $breadcrumb);
	}
	
	public function getInconsistenciasPendientes(Request $request)
	{
		return response()->json($this->inconsistencia_gestion->getPendingReporting());
	}
	
	public function getEditar($id) {
		$inconsistencia = $this->inconsistencia_gestion->getById($id);
	
		if($inconsistencia->estado == 'ATENDIDO') {
			abort(403);
		}
		
		$tipos_servicios = $this->getDataTiposServicios($inconsistencia->catalogo_auditoria);
		$tipos_servicios = array_combine($tipos_servicios, $tipos_servicios);
		
		$breadcrumb = [
				['name' => 'Inconsistencias - Edición' ]
		];
		
		$acciones = [];
		if(old('resolucion')) {
			$acciones = $this->getDataAcciones(old('resolucion'));
			$acciones = array_combine($acciones, $acciones);
		}
		
		return view('inconsistencias/editar', $inconsistencia)
			->with('page_title', 'Inconsistencias - Registro de Casos')
			->with('navigation', 'inconsistencias')
			->with('catalogo_auditorias', $this->catalogo_auditorias)
			->with('tipos_servicio', $tipos_servicios)
			->with('inconsistencias', $this->inconsistencias)
			->with('resoluciones', $this->resoluciones)
			->with('acciones', $acciones)
			->with('breadcrumb', $breadcrumb);
	}
	
	
	private function getDataAcciones($resolucion) {
		switch($resolucion) {
			case 'CORRECTO' : return $this->accion_correcta; break;
			case 'INCORRECTO' : return $this->accion_incorrecta; break;
			default: return array();
		}
	}
	
	public function getAcciones(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataAcciones($inputs['resolucion']);
		return response()->json($response);
	}
	
	public function putEditar(PutInconsistenciaRequest $request) {
		$inconsistencia = $this->inconsistencia_gestion->update($request->all(), $request->user()->username);
	
		$mensaje = 'Se ha actualizado el Caso No. '. $request->input('id') . ' correctamente.';
	
		return redirect('inconsistencias/reporte-pendientes')
			->with('success_message', $mensaje);
	}
}