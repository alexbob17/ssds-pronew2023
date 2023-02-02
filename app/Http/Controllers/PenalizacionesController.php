<?php 

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;
use SSD\Http\Requests\PenalizacionRequest;
use SSD\Http\Requests\AgenteRequest;
use SSD\Http\Requests\PutAgenteRequest;
use SSD\Repositories\PenalizacionRepository;


class PenalizacionesController extends Controller {

	protected $penalizacion_gestion;
	
	protected $niveles = [
		'Nivel 1' => 'Nivel 1',
		'Nivel 2' => 'Nivel 2',
	];
	
	protected $catalogo_nivel_1 = [ 'OPERATIVO', 'SAP'];
	protected $catalogo_nivel_2 = [ 'OPERATIVO', 'SAP', 'ADMINISTRATIVO'];
	
	protected $aplicativos_operativos = ['OPEN', 'SYRENG', 'AXIROS', 'ETA', 'WEB', 'QFLOW', 'INTRANET', 'CIC'];
	protected $aplicativos_sap = ['SAP SINERGIA', 'MA-SAP'];
	protected $aplicativos_administrativos = ['DESEMPEÑO ADMON'];
	
	protected $clasificaciones = ['VENTA', 'TRASLADO', 'MIGRACIONES', 'ADICIONES', 
			'CAMBIO DE EQUIPOS', 'DAÑO', 'QFLOW', 'RX HFC', 'ADMINISTRATIVA'];
	
	protected $tecnologias = [
		'IPTV'			=> 'IPTV',
		'TV DTH' 	=> 'TV DTH',
		'TV HFC'	=> 'TV HFC',
		'LINEA COBRE'	=> 'LINEA COBRE',
		'LINEA HFC'		=> 'LINEA HFC',
		'INTERNET ADSL'	=> 'INTERNET ADSL',
		'INTERNET HFC'	=> 'INTERNET HFC',
		'GPON'			=> 'GPON',
		'TXDX'			=> 'TXDX',
		'E1'			=> 'E1',
	];
	
	protected $malos_procesos_open = [
		'Orden de transferencia a MTTO mal realizada',
		'Orden de rectificacion mal realizada ',
		'Daño por excedente de metraje fue atendido',
		'Causal de excedente de metraje no fue modificado',
		'Daño por nodo saturado fue atendido',
		'Causal de nodo saturado no fue modificado',
		'Daño por DSLAM saturado fue atendido',
		'Causal de DSLAM saturado no fue modificado',
		'Daño por cambio de tecnología fue atendido',
		'Causal de cambio de tecnología no fue modificado',
		'No deja comentarios de anulación',
		'ANULARSP no aplica en venta/traslado/adición',
		'Falta seguimiento de los estados en OPEN (ORCAO & TTCAD)',
		'Quitar impedimento con deuda (CD)',
		'Daño fue mal diagnosticado',
		'Daño mal generado',
		'Daño atendido con fecha y hora incorrecto',
		'Códigos de liquidación incorrecto',
		'Código de contrata incorrecto',
		'Daño infundado o anulado sin comentarios',
		'Mal proceso en cita cumplida',
		'Mal proceso en cita incumplida',
		'Codigo de cuadrilla incorrecto',
		'Causal incorrecta de anulación (38)',
		'Cambió de DTA a STB en C. Equipo',
		'Cambió de STB a DTA en C. Equipo',
		'Cambió de STB DTH a DTA en C. Equipo',
		'Cambió de STB DTH a STB HFC en C. Equipo',
		'Clase de Servicio Incorrecta en C. Equipo',
		'Serie de STB/DTA/MODEM  incorrecto',
		'Cambió de DTA a STB en Instalación',
		'Cambió de STB a DTA en Instalación',
		'Cambió de STB DTH a DTA en Instalación',
		'Cambió de STB DTH a STB HFC en Instalación',
		'No legaliza CLARO VIDEO',
		'Atienden instalación con nodo incorrecto',	
		'No finaliza Procedo en IMPAS',
		'No documento las inconsistencias de la solicitud',
		'Plan comercial en migración incorrecto ',
		'No reviso elemetos de red en Inst. de Internet',
		'No reviso elemetos de red en Inst. de VOIP',
		'Mal descargue de material',
		'Orden de transferencia mal realizada',
		'Mal proceso de agendamiento',
		'Legaliza solicitud incorrecta',
		'No valida correctamente solicitudes en sistema',
		'Otros',
	];
	
	protected $malos_procesos_syreng = [
		'Syreng pendiente pero en OPEN atendido',
		'Syreng sin comentarios y retornan tecnico a N2',
		'Syreng mal documentado',
		'Syreng atendido pero en OPEN pendiente',
		'No realiza encuesta de satisfacción',
		'Otros',
	];
	
	protected $malos_procesos_axiros = [
		'No validó equipo en plataforma',
		'No validó en plataforma equipo aparece Apagado',
		'Equipo en estado Suspendido',
		'No gestionó número no registrado con G. Abonado',
		'No gestionó cambio de perfil VOIP',
		'No valida niveles en servicio triple',
		'Otros',
	];
	
	protected $malos_procesos_eta = [
		'Crear orden en ETA y no asignarsela al técnico en su bandeja',
		'Solicitud de transferencia a MTTO Bucket incorrecto',
		'Solicitud transferida a MTTO no se direccionó',
		'Solicitud de rectificación Bucket incorrecto',
		'Solicitud de rectificación no se direccionó',
		'Orden en ETA no fue cancelada',
		'No suspendió orden en ETA',
		'Mueve de buket en ETA orden incorrecta',
		'Otros',
	];
	
	protected $malos_procesos_web = [
		'Consultas mal tipificadas',
		'No documentar/Consulta',
		'Boleta de transferencia a MTTO mal realizada', 
		'Boleta de rectificación mal realizada',
		'Atendidos en OPEN pendiente en Web',
		'Boleta mal documentada',
		'Boleta incompleta',
		'Boleta con orden incorrecta',
		'Boleta sin Syreng',
		'Boleta sin número de cobre Inst.',
		'Comentario de anulación en campo incorrecto',
		'Campo de equipos sin uilizar',
		'Campo recibe sin comentarios',
		'Boleta con códigos incorrectos',
		'Otros',
	];
	
	protected $malos_procesos_qflow = [
		'Qflow dilación en bandeja principal',
		'Baja productividad Qflow',
		'Cierre de caso, gestión pendiente',
		'Falta de resolutividad',
		'Qflow con mala redacción en la respuesta',
		'Otros',
	];
	
	protected $malos_procesos_intranet = [
		'No validó deuda',
		'No registró deuda en SSD',
		'Otros',
	];
	
	protected $malos_procesos_ma_sap = [
		'1.1 -Dejan mano de obra individual y es casa claro',
		'1.2 -Sin mano de obra solo descargo materiales',
		'1.3 -Error en la cantidad de tv',
		'1.4 -Dejan mano de obra de tv y es internet',
		'1.5 -Dejan doble play y es triple',
		'1.6 -Dejan mano de obra de casa claro y es individual',
		'1.7 -Dejan mano de obra de internet y es tv',
		'1.8 -dejan triple play y es doble',
		'2.1 -Ubicación geográfica errónea',
		'2.2 -Dejan mano de obra de 51 km y es 50 km',
		'2.3 -Dejan mano de obra de 50 km y es 51 km',
		'2.4 -Dejan mano de obra de instalación y es adición',
		'2.5 -No registro mano de obra solo descargó materiales',
		'2.6 -Dejan mano de obra de adición y es instalación',
		'3.1 -Ubicación geográfica errónea',
		'3.2 -Dejan tramo y es línea acometida exterior aérea',
		'3.3 -Cantidad errónea en el número de tramos',
		'3.4 -No generó SAP',
		'3.5 -Generó SAP pero con solicitud incorrecta',
		'3.6 -Otros'
	];
	
	protected $malos_procesos_sap_sinergia = [
		'4 -Errores en seriealizado SAP Sinergia',
		'4.1 -Equipo en otra bodega',
		'4.2 -Equipo en otro lote',
		'4.3 -Equipo en tránsito',
		'4.4 -Equipo fuera de bodega',
		'4.5 -No validó en SAP Sinergia',
		'4.6 -Otros',
	];
	
	protected $malos_procesos_desempeno_admon = [
		'Puntualidad',
		'Buena actitud',
		'Trabajo en equipo', 
		'Comunicativo',
		'Participa en actividades',
		'Buen desempeño',
		'Permisos el mismo día', 
		'No justifica ausencias en tiempo y forma', 
		'Falta de seguimiento a dilaciones de productos',
		'Falta de revision y envío de reportes',
		'Falta de seguimiento de casos', 
		'No registra mal proceso de N1 en SSD',
		'Falta de seguimiento a incidentes',
		'No registra vacaciones/permisos en tiempo y forma',
		'Falta de lectura de Intrasac',
		'Falta de revision de correos',
		'Tener al día sus accesos o herrmientas',
		'SAP bloq',
		'Otros',
	];
	
	protected $malos_procesos_cic = [
		'Confrontar al cliente y/o técnico',
		'Conversaciones ajenas al servicio e interactuar con sus compañeros durante la llamada',
		'Cortar llamada',
		'Hacer comentarios adversos a la empresa',
		'Indicarle al cliente ir a tienda de manera innecesaria',
		'Lenguaje soez',
		'Levantar el tono de voz al cliente y/o técnico',
		'Llamadas personales',
		'Mala actitud de servicio durante la llamada (crea molestia en el cliente y/o técnico por actitud, atención, burlarse del cliente y/o técnico)',
		'No agotar alternativas de búsqueda',
		'No indaga sobre la consulta del cliente y/o técnico y no brinda solución',
		'Por no atender la llamada',
		'No comunicar al cliente y/o técnico con el Supervisor cuando éste lo solicite',
		'Uso incorrecto de herramientas',
		'Dejar al cliente y/o técnico en espera innecesaria no importa la cantidad de tiempo',
		'Retener llamada',
		'Indicarle al técnico avocarse con supervision tec de manera innecesaria',
		'No contacta a cliente en linea',
		'Brinda información que esta en GECODE/ETA',
		'Incumplimiento de orientación',
		'Otros',
	];
	
	public function __construct(PenalizacionRepository $penalizacion_gestion)
	{
		$this->penalizacion_gestion = $penalizacion_gestion;
		$this->middleware('auth');
		$this->middleware('role:admin|operador', ['only' => ['getRegistro', 'postRegistro']]);
		$this->middleware('role:admin', ['only' => ['getReportes', 'getReporteAtendidos']]);
		$this->middleware('ajax', ['only' => ['getReporteAtendidos']]);
	}

	public function getRegistro()
	{		
		$breadcrumb = [
			['name' => 'Penalización 0 - Registro' ]
		];		
		
		$agentes = [];
		$catalogos = [];
		$aplicativos = [];
		$clasificaciones = [];
		$malos_procesos = [];
		
		if (old('nivel')) {
			if(old('nivel')) {
				$agentes = $this->getDataAgentes(old('nivel'))->toArray();
				$agentes = array_combine($agentes, $agentes);
				$catalogos = $this->getDataCatalogos(old('nivel'));
				$catalogos = array_combine($catalogos, $catalogos);
			}
			if(old('catalogo_auditoria')) {
				$aplicativos = $this->getDataAplicativos(old('catalogo_auditoria'));
				$aplicativos = array_combine($aplicativos, $aplicativos);
			}
			if(old('aplicativo')) {
				$clasificaciones = $this->getDataClasificaciones(old('aplicativo'));
				$clasificaciones = array_combine($clasificaciones, $clasificaciones);
				$malos_procesos = $this->getDataMalosProcesos(old('aplicativo'));
				$malos_procesos = array_combine($malos_procesos, $malos_procesos);
			}
		}
		
		return view('penalizaciones/registro')
			->with('page_title', 'Penalización 0 - Registro de Casos')
			->with('navigation', 'penalizaciones')
			->with('niveles', $this->niveles)
			->with('agentes', $agentes)
			->with('catalogos', $catalogos)
			->with('aplicativos', $aplicativos)
			->with('clasificaciones', $clasificaciones)
			->with('tecnologias', $this->tecnologias)
			->with('malos_procesos', $malos_procesos)
			->with('breadcrumb', $breadcrumb);
	}
	
	public function postRegistro(PenalizacionRequest $request)
	{
		$this->penalizacion_gestion->store($request->all(), $request->user()->username);
		return redirect()->back()->with('success_message', 'Se ha registrado el caso correctamente.');
	}
	
	private function getDataAgentes($nivel) {
		return $this->penalizacion_gestion->getListAgents($nivel);
	}
	
	public function getAgentes(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataAgentes($inputs['nivel']);
		return response()->json($response);
	}
	
	private function getDataCatalogos($nivel) {
		switch($nivel) {
			case 'Nivel 1' : return $this->catalogo_nivel_1; break;
			case 'Nivel 2' : return $this->catalogo_nivel_2; break;
			default: return array();
		}
	}
	
	public function getCatalogos(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataCatalogos($inputs['nivel']);
		return response()->json($response);
	}
	
	private function getDataAplicativos($catalogo_auditoria) {
		switch($catalogo_auditoria) {
			case 'OPERATIVO' : return $this->aplicativos_operativos; break;
			case 'SAP' : return $this->aplicativos_sap; break;
			case 'ADMINISTRATIVO' : return $this->aplicativos_administrativos; break;
			default: return array();
		}
	}
	
	public function getAplicativos(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataAplicativos($inputs['catalogo_auditoria']);
		return response()->json($response);
	}
	
	private function getDataClasificaciones($aplicativo) {
		if($aplicativo == 'CIC') {
			return array('ATENCION LLAMADAS');
		} else if( $aplicativo == 'DESEMPEÑO ADMON' ||
			in_array($aplicativo, $this->aplicativos_operativos) || 
			in_array($aplicativo, $this->aplicativos_sap)) {
			return $this->clasificaciones;
		} else {
			return array();
		}
	}
	
	public function getClasificaciones(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataClasificaciones($inputs['aplicativo']);
		return response()->json($response);
	}

	private function getDataMalosProcesos($aplicativo) {
		switch($aplicativo) {
			case 'OPEN' : return $this->malos_procesos_open; break;
			case 'SYRENG' : return $this->malos_procesos_syreng; break;
			case 'AXIROS' : return $this->malos_procesos_axiros; break;
			case 'ETA' : return $this->malos_procesos_eta; break;
			case 'WEB' : return $this->malos_procesos_web; break;
			case 'QFLOW' : return $this->malos_procesos_qflow; break;
			case 'INTRANET' : return $this->malos_procesos_intranet; break;
			case 'SAP SINERGIA' : return $this->malos_procesos_sap_sinergia; break;
			case 'MA-SAP' : return $this->malos_procesos_ma_sap; break;
			case 'DESEMPEÑO ADMON' : return $this->malos_procesos_desempeno_admon; break;
			case 'CIC': return $this->malos_procesos_cic; break;
			default: return array();
		}
	}
	
	public function getMalosProcesos(Request $request)
	{
		$inputs = $request->all();
		$response = $this->getDataMalosProcesos($inputs['aplicativo']);
		return response()->json($response);
	}
	
	public function getReportes() {
		$breadcrumb = [
				['name' => 'Penalización 0 - Reporte' ]
		];
	
		$usernames = $this->penalizacion_gestion->getUsersCanRegister();
			
		return view('penalizaciones/reportes')
		->with('page_title', 'Penalización 0 - Reporte de Casos Registrados')
		->with('navigation', 'penalizaciones')
		->with('breadcrumb', $breadcrumb)
		->with('usernames', $usernames);
	}
	
	public function getReporteAtendidos(Request $request)
	{
		$inputs = $request->all();
		if($inputs['fecha_inicial'] != null & $inputs['fecha_final'] != null)
			return response()->json($this->penalizacion_gestion->getRegisterReporting($inputs['fecha_inicial'], $inputs['fecha_final'], $inputs['username']));
		else
			return response()->json();
	}
	
	public function getAdministrarAgentes()
	{
		$breadcrumb = [
				['name' => 'Penalización 0  - Agentes' ]
		];
				
		return view('penalizaciones/administrar-agentes')
			->with('page_title', 'Administrar Agentes')
			->with('navigation', 'penalizaciones')
			->with('breadcrumb', $breadcrumb)
			->with('agentes', $this->penalizacion_gestion->getAgents());
	}
	
	public function getCambiarEstado($id) {
		$usuario = $this->penalizacion_gestion->changeStatus($id);
		return redirect('penalizaciones/administrar-agentes');
	}
	
	public function getRegistroAgente()
	{
		$breadcrumb = [
				['route' => 'penalizaciones/administrar-agentes', 'name' => 'Penalizacion 0 - Registro Agente'],
				['name' => 'Registro' ]
		];
	
		return view('penalizaciones/registro-agente')
			->with('page_title', 'Registro de Agentes')
			->with('navigation', 'penalizaciones')
			->with('breadcrumb', $breadcrumb)
			->with('niveles', $this->niveles);				
	}
	
	public function postRegistroAgente(AgenteRequest $request)
	{
		$this->penalizacion_gestion->storeAgent($request->all());
		return redirect()->back()->with('success_message', 'Se ha registrado el agente correctamente.');
	}
	
	public function getEditarAgente($id)
	{
		$agente = $this->penalizacion_gestion->getAgentById($id);
	
		$breadcrumb = [
				['route' => 'penalizaciones/administrar-agentes', 'name' => 'Penalización 0 - Editar Agente'],
				['name' => 'Editar' ]
		];
	
		return view('penalizaciones/editar-agente', $agente)
			->with('page_title', 'Edición de Agente')
			->with('navigation', 'penalizaciones')
			->with('breadcrumb', $breadcrumb)
			->with('niveles', $this->niveles);
	}
	
	public function putEditar(PutAgenteRequest $request) {
		$inputs = $request->all();
	
		$agente = $this->penalizacion_gestion->updateAgent($request->all());
	
		return redirect('penalizaciones/administrar-agentes')
			->with('success_message', 'Se ha actualizado los datos del agente "' . $agente->nombre . ' " correctamente.');
	}
}