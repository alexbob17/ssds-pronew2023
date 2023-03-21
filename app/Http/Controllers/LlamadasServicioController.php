<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Models\Instalaciones\InstalacionAdslRealizada;

use SSD\Models\Instalaciones\InstalacionAdslObjetada;

use SSD\Models\Instalaciones\InstalacionAdslAnulada;

use SSD\Models\Instalaciones\InstalacionCobreRealizada;

use SSD\Models\Instalaciones\InstalacionCobreObjetada;

use SSD\Models\Instalaciones\InstalacionCobreAnulada;

use SSD\Models\Instalaciones\InstalacionDthRealizada;

use SSD\Models\Instalaciones\InstalacionDthObjetada;

use SSD\Models\Instalaciones\InstalacionDthAnulada;

use SSD\Models\Instalaciones\InstalacionGponRealizada;

use SSD\Models\Instalaciones\InstalacionGponObjetada;

use SSD\Models\Instalaciones\InstalacionGponTransferida;

use SSD\Models\Instalaciones\InstalacionGponAnulada;

use SSD\Models\Instalaciones\InstalacionHfcRealizada;

use SSD\Models\Instalaciones\InstalacionHfcObjetada;

use SSD\Models\Instalaciones\InstalacionHfcTransferida;

use SSD\Models\Instalaciones\InstalacionHfcAnulada;


use SSD\Http\Requests;

use Illuminate\Support\Facades\Storage;


class LlamadasServicioController extends Controller
{
		

    public function showPostVentas()
	{		
		$breadcrumb = [
				['name' => 'Postventas - Saturado' ]
		];		
		
		return view('llamadashome/postventa')
			->with('page_title', 'Postventas - Registro')
			->with('navigation', 'Postventas');
	}


	public function showInstalaciones()
	{		
		$breadcrumb = [
				['name' => 'Instalaciones - Saturado' ]
		];		
		
		return view('llamadashome/instalaciones')
			->with('page_title', 'Instalaciones - Registro')
			->with('navigation', 'Instalaciones');

			
	}
	

	public function store(Request $request)
    {
        $tecnologia = $request->input('tecnologia');

        // Evaluamos la tecnología seleccionada
        switch ($tecnologia) {
            case 'HFC':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'select_orden',
					'dpto_colonia',
					'tipo_actividad',
					'orden_tv_hfc',
					'orden_internet_hfc',
					'orden_linea_hfc',
					'equipostv1',
					'equipostv2',
					'equipostv3',
					'equipostv4',
					'equipostv5',
					'syrengHfc',
					'sapHfc',
					'EquipoModem_Hfc',
					'numeroVoip_hfc',
					'GeorefHfc',
					'TrabajadoHfc',
					'ObservacionesHfc',
					'RecibeHfc',
					'NodoHfc',
					'TapHfc',
					'PosicionHfc',
					'MaterialesHfc',
                ];

                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoHfc' && $request->has('TrabajadoHfc')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoHfc') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				// dd($data);

				
                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['tipo_actividad'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataHfcRealizada = new InstalacionHfcRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcRealizada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO HFC COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
                }elseif ($data['tipo_actividad'] == 'OBJETADA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'MotivoObjetada_Hfc',
						'TrabajadoObjetadaHfc',
						'ComentariosObjetados_Hfc',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjetadaHfc' && $request->has('TrabajadoObjetadaHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjetadaHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataHfcObjetada = new InstalacionHfcObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO HFC OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividad'] == 'TRANSFERIDA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'TrabajadoTransferido_Hfc',
						'MotivoTransferidoHfc',
						'ComentariosTransferida_Hfc',

					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransferido_Hfc' && $request->has('TrabajadoTransferido_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransferido_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataHfcTransferida= new InstalacionHfcTransferida($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcTransferida->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON TRANSFERIDO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividad'] == 'ANULACION') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividad',
						'MotivoAnulada_Hfc',
						'orden_internet_hfc',
						'orden_tv_hfc',
						'orden_linea_hfc',
						'TrabajadoAnulada_Hfc',
						'ComentarioAnulada_Hfc',

					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnulada_Hfc' && $request->has('TrabajadoAnulada_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnulada_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataHfcAnulada= new InstalacionHfcAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON TRANSFERIDO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }
                break;
            case 'GPON':	
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'select_orden',
					'dpto_colonia',
					'OrdenInternet_Gpon',
					'OrdenTv_Gpon',
					'OrdenLinea_Gpon',
					'tipo_actividadGpon',
					'equipotv1Gpon',
					'equipotv2Gpon',
					'equipostv3Gpon',
					'equipostv4Gpon',
					'equipostv5Gpon',
					'EqModenGpon',
					'GeoreferenciaGpon',
					'SapGpon',
					'NumeroGpon',
					'TrabajadoGpon',
					'ObservacionesGpon',
					'RecibeGpon',
					'NodoGpon',
					'CajaGpon',
					'PuertoGpon',
					'MaterialesRedGpon',
                ];

                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoGpon' && $request->has('TrabajadoGpon')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoGpon') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				// dd($data);

				
                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['tipo_actividadGpon'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataGponRealizada = new InstalacionGponRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataGponRealizada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO GPON COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
                }elseif ($data['tipo_actividadGpon'] == 'OBJETADA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadGpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'MotivoObjetado_Gpon',
						'TrabajadoGpon_Objetado',
						'ObsGpon_Objetada',
						'ComentariosGpon_Objetada',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoGpon_Objetado' && $request->has('TrabajadoGpon_Objetado')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoGpon_Objetado') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataGponObjetada = new InstalacionGponObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataGponObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividadGpon'] == 'TRANSFERIDA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadGpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'MotivoTransferidoGpon',
						'TrabajadoTransferido_Gpon',
						'ComentarioTransferido_Gpon',

					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransferido_Gpon' && $request->has('TrabajadoTransferido_Gpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransferido_Gpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataGponTransferida= new InstalacionGponTransferida($data);

                    // Guardamos la instancia en la base de datos
                    $dataGponTransferida->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON TRANSFERIDO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividadGpon'] == 'ANULACION') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadGpon',
						'MotivoAnulada_Gpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'TrabajadoAnulada_Gpon',
						'ComentarioAnulada_Gpon',

					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnulada_Gpon' && $request->has('TrabajadoAnulada_Gpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnulada_Gpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataGponAnulada= new InstalacionGponAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataGponAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON ANULADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }		
                break;
            case 'COBRE':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'select_orden',
					'dpto_colonia',
					'tipo_actividadCobre',
					'OrdenLineaCobre',
					'NumeroCobre',
					'GeoreferenciaCobre',
					'sap_cobre',
					'TrabajadoCobre',
					'ObservacionesCobre',
					'RecibeCobre',
					'MaterialesCobre',
                ];

                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoCobre' && $request->has('TrabajadoCobre')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoCobre') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				// dd($data);

				
                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['tipo_actividadCobre'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataCobreRealizada = new InstalacionCobreRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataCobreRealizada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO COBRE COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
                }
				elseif ($data['tipo_actividadCobre'] == 'OBJETADA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadCobre',
						'MotivoObjetada_Cobre',
						'OrdenCobre_Objetada',
						'TrabajadoCobre_Objetado',
						'ComentariosCobre_Objetados',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoCobre_Objetado' && $request->has('TrabajadoCobre_Objetado')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoCobre_Objetado') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataCobreObjetada = new InstalacionCobreObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataCobreObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO COBRE OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividadCobre'] == 'ANULACION') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'MotivoAnulada_Adsl',
						'OrdenAnuladaAdsl',
						'TrabajadoAnulada_Adsl',
						'ComentarioAnulada_Adsl',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnulada_Adsl' && $request->has('TrabajadoAnulada_Adsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnulada_Adsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					dd($data);

					$dataAdslAnulada = new InstalacionAdslAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdslAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO COBRE ANULACION COMPLETADO";

					
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
						
					
                }
                break;
            case 'DTH':
				$selectedFields = [
                    'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'select_orden',
					'dpto_colonia',
					'tipo_actividadDth',
					'ordenTv_Dth',
					'SyrengDth',
					'GeoreferenciaDth',
					'sap_dth',
					'TrabajadoDth',
					'SmarcardDth1',
					'SmarcardDth2',
					'SmarcardDth3',
					'SmarcardDth4',
					'SmarcardDth5',
					'StbDth1',
					'StbDth2',
					'StbDth3',
					'StbDth4',
					'StbDth5',
					'ObservacionesDth',
					'RecibeDth',
					'MaterialesDth'
                ];

                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoDth' && $request->has('TrabajadoDth')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoDth') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				// dd($data);
				
                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['tipo_actividadDth'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataDthRealizada = new InstalacionDthRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataDthRealizada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO DTH COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
                }elseif ($data['tipo_actividadDth'] == 'OBJETADA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadDth',
						'MotivoObjetada_Dth',
						'TrabajadoObj_Dth',
						'OrdenObj_Dth',
						'ComentarioObjetado_Dth',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObj_Dth' && $request->has('TrabajadoObj_Dth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObj_Dth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataDthObjetada = new InstalacionDthObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataDthObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO DTH OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividadDth'] == 'ANULACION') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadDth',
						'MotivoAnulada_Dth',
						'OrdenAnulada_Dth',
						'TrabajadoAnulada_Dth',
						'ComentarioAnulada_Dth',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnulada_Dth' && $request->has('TrabajadoAnulada_Dth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnulada_Dth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataDthAnulada = new InstalacionDthAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataDthAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO DTH ANULACION COMPLETADO";

					
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
						
					
                }
                break;
            case 'ADSL':
                $selectedFields = [
                    'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'select_orden',
                    'dpto_colonia',
                    'tipo_actividadAdsl',
                    'orden_internet_adsl',
                    'Georeferencia_Adsl',
                    'TrabajadoAdsl',
                    'Obvservaciones_Adsl',
                    'Recibe_Adsl',
                    'Materiales_Adsl'
                ];

                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoAdsl' && $request->has('TrabajadoAdsl')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoAdsl') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				// dd($data);

				
                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['tipo_actividadAdsl'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataAdslRealizada = new InstalacionAdslRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdslRealizada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ADSL COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
                } elseif ($data['tipo_actividadAdsl'] == 'OBJETADA') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadAdsl',
						'MotivoObjetada_Adsl',
						'OrdenAdsl_Objetada',
						'TrabajadoAdslObjetado',
						'ComentariosObjetada_Adsl',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAdslObjetado' && $request->has('TrabajadoAdslObjetado')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAdslObjetado') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataAdslObjetada = new InstalacionAdslObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdslObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO ADSL OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividadAdsl'] == 'ANULACION') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tipo_actividadAdsl',
						'MotivoAnulada_Adsl',
						'OrdenAnuladaAdsl',
						'TrabajadoAnulada_Adsl',
						'ComentarioAnulada_Adsl',
					];
	
					$data = [];
	
					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnulada_Adsl' && $request->has('TrabajadoAnulada_Adsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnulada_Adsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}
					// dd($data);

					$dataAdslAnulada = new InstalacionAdslAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdslAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO ADSL ANULADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }

                break;

            // En caso de que no se haya seleccionado una tecnología válida, no hacemos nada
            default:
                break;
        }

        // Redireccionamos a la página de inicio
        return redirect('/');
    }

}

   