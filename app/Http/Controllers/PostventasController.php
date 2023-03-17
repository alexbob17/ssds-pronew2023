<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;


use SSD\Models\PostventaCambioNumeroCobreRealizada;

use SSD\Models\PostventaCambioNumeroCobreObjetada;
use SSD\Models\PostventaCambioNumeroCobreAnulada;
use SSD\Models\PostventaRetiroHfcRealizada;
use SSD\Models\PostventaRetiroHfcObjetada;
use SSD\Models\PostventaRetiroHfcAnulada;
use SSD\Models\PostventaMigracionTransferida;
use SSD\Models\PostventaMigracionAnulada;
use SSD\Models\PostventaMigracionObjetada;
use SSD\Models\PostventaMigracionRealizada;




class PostventasController extends Controller
{
    public function showRegistro()
	{		
		$breadcrumb = [
			['name' => 'PostVenta - Saturado' ]
	];	
	
			return view('postventas/registro')
			->with('page_title', 'PostVenta - Registro')
			->with('navigation', 'PostVenta');
	}


	public function store(Request $request)
    {
        $tecnologia = $request->input('tecnologia');
		$Select_Postventa = $request->input("Select_Postventa");

		$key = $Select_Postventa . '|' . $tecnologia;

        // Evaluamos la tecnología seleccionada
        switch ($key) {
			case 'MIGRACION|HFC':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadMigracionHfc',
					'equipotvmigracion1',
					'equipotvmigracion2',
					'equipotvmigracion3',
					'equipotvmigracion4',
					'equipotvmigracion5',
					'NOrdenMigracionHfc',
					'SyrengMigracionHfc',
					'SapMigracionHfc',
					'ObvsMigracionHfc',
					'TrabajadoMigracionHfc',
					'RecibeMigracionHfc',
					'NodoMigracionHfc',
					'TapMigracionRealizadaHfc',
					'PosicionMigracionHfc',
					'GeorefMigracionHfc',
					'MaterialesMigracionHfc',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoMigracionHfc' && $request->has('TrabajadoMigracionHfc')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoMigracionHfc') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}

				
				// dd($data);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;


                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadMigracionHfc'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataMigracionRealizada = new PostventaMigracionRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataMigracionRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO RECONEXION / RETIRO HFC COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadMigracionHfc'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadMigracionHfc',
						'MotivoMigracionObjHfc',
						'OrdenMigracionHfcObj',
						'TrabajadoMigracionObjHfc',
						'ObvsMigracionObjHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoMigracionObjHfc' && $request->has('TrabajadoMigracionObjHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoMigracionObjHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataMigracionHfcObj = new PostventaMigracionObjetada($data);

					// Guardamos la instancia en la base de datos
					$dataMigracionHfcObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO RETIRO / RECONEXIO HFC OBJETADO COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadMigracionHfc'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadMigracionHfc',
						'MotivoMigracionAnulada_Hfc',
						'NOrdenMigracionAnuladaHfc',
						'TrabajadoMigracionAnulada_Hfc',
						'ComentarioMigracionAnulada_Hfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoMigracionAnulada_Hfc' && $request->has('TrabajadoMigracionAnulada_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoMigracionAnulada_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataMigracionAnulada = new PostventaMigracionAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataMigracionAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO MIGRACION ANULACION COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}elseif($data['TipoActividadMigracionHfc'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadMigracionHfc',
						'OrdenMigracionTranfHfc',
						'TrabajadoMigracionTransHfc',
						'MotivoTransMigracionHfc',
						'ComentsMigracionTransHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoMigracionTransHfc' && $request->has('TrabajadoMigracionTransHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoMigracionTransHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataMigracionTransferida = new PostventaMigracionTransferida($data);

					// Guardamos la instancia en la base de datos
					$dataMigracionTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO MIGRACION TRANSFERIDO COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				
				break;
			case 'RECONEXION / RETIRO|HFC':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadReconexionHfc',
					'EquipoModemRetiroHfc',
					'OrdenRetiroHfc',
					'TrabajadoRetiroHfc',
					'ObvsRetiroHfc',
					'RecibeRetiroHfc',
					'MaterialesRetiroHfc',
                ];

		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoRetiroHfc' && $request->has('TrabajadoRetiroHfc')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoRetiroHfc') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}

				
				// dd($data);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;


                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadReconexionHfc'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataRetiroRealizada = new PostventaRetiroHfcRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataRetiroRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO RECONEXION / RETIRO HFC COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadReconexionHfc'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadReconexionHfc',
						'MotivoObjRetiroHfc',
						'OrdenRetiroObjHfc',
						'TrabajadoObjRetiroHfc',
						'ObvsObjRetiroHfc',
						'ComentariosRetiroObjHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjRetiroHfc' && $request->has('TrabajadoObjRetiroHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjRetiroHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataRetiroHfcObj = new PostventaRetiroHfcObjetada($data);

					// Guardamos la instancia en la base de datos
					$dataRetiroHfcObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO RETIRO / RECONEXIO HFC OBJETADO COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadReconexionHfc'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadReconexionHfc',
						'MotivoRetiroAnulada_Hfc',
						'OrdenRetiroAnulacionHfc',
						'TrabajadoRetiroAnulada_Hfc',
						'ComentsRetiroAnulada_Hfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoRetiroAnulada_Hfc' && $request->has('TrabajadoRetiroAnulada_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoRetiroAnulada_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReconexionAnulada = new PostventaRetiroHfcAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataReconexionAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO RETIRO / RECONEXION ANULACION COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				
                break;
			
            case 'CAMBIO NUMERO COBRE|COBRE':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadCambioNumeroCobre',
					'NumeroCobreCambio',
					'OrdenCambioCobre',
					'TrabajadoCambioCobre',
					'ObvsCambioCobre',
					'RecibeCambioCobre',
                ];

		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoCambioCobre' && $request->has('TrabajadoCambioCobre')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoCambioCobre') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}

				
				// dd($data);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;


                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadCambioNumeroCobre'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataCambioCobreRealizada = new PostventaCambioNumeroCobreRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataCambioCobreRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO CAMBIO NUMERO REALIZADO COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadCambioNumeroCobre'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioNumeroCobre',
						'MotivoObjCambioCobre',
						'OrdenObjCambioCobre',
						'TrabajadoObjCambioCobre',
						'ObvsObjCambioCobre',
						'ComentariosCambioCobre',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjCambioCobre' && $request->has('TrabajadoObjCambioCobre')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjCambioCobre') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioCobreObjetada = new PostventaCambioNumeroCobreObjetada($data);

					// Guardamos la instancia en la base de datos
					$dataCambioCobreObjetada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO CAMBIO NUMERO COBRE OBJETADO COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadCambioNumeroCobre'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioNumeroCobre',
						'MotivoAnuladaCambioCobre',
						'OrdenAnuladaCambioCobre',
						'TrabajadoAnuladaCambioCobre',
						'ObvsObjCambioCobre',
						'ComentariosCambioCobre'
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnuladaCambioCobre' && $request->has('TrabajadoAnuladaCambioCobre')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnuladaCambioCobre') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

				// dd($data);


					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioCobreAnulada = new PostventaCambioNumeroCobreAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataCambioCobreAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO CAMBIO NUMERO COBRE ANULACION COMPLETADO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				
                break;
        
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
 
            
			default:
            break;
        }

        // Redireccionamos a la página de inicio
        return redirect('/');
    }
}