<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Models\InstalacionAdslRealizada;

use SSD\Models\InstalacionAdslObjetada;

use SSD\Models\InstalacionCobreRealizada;

use SSD\Models\InstalacionCobreObjetada;

use SSD\Models\InstalacionDthRealizada;

use SSD\Models\InstalacionDthObjetada;



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
			->with('page_title', 'Postventas - Servicio')
			->with('navigation', 'Postventas');
	}


	public function showInstalaciones()
	{		
		$breadcrumb = [
				['name' => 'Instalaciones - Saturado' ]
		];		
		
		return view('llamadashome/instalaciones')
			->with('page_title', 'Instalaciones - Servicio')
			->with('navigation', 'Instalaciones');

			
	}
	


	public function store(Request $request)
    {
        $tecnologia = $request->input('tecnologia');

        // Evaluamos la tecnología seleccionada
        switch ($tecnologia) {
            case 'HFC':
                break;
            case 'GPON':
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
                        ->with('page_title', 'Instalaciones - Instalaciones Servicio')
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
                        ->with('page_title', 'Instalaciones - Instalaciones Servicio')
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
                        ->with('page_title', 'Instalaciones - Instalaciones Servicio')
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
                        ->with('page_title', 'Instalaciones - Instalaciones Servicio')
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
                        ->with('page_title', 'Instalaciones - Instalaciones Servicio')
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
                        ->with('page_title', 'Instalaciones - Instalaciones Servicio')
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

// public function store(Request $request){
// 	$tecnologia = $request->input('tecnologia');
// 	switch ($tecnologia) {
// 		case 'HFC':
// 			// Guardamos los datos en un archivo txt
// 			break;
// 		case 'GPON':
// 			// Guardamos los datos en un archivo txt
// 			break;
// 		case 'COBRE':
// 			// Guardamos los datos en un archivo txt
// 			break;
// 		case 'DTH':
// 			// Guardamos los datos en un archivo txt
// 		case 'ADSL':
// 			$selectedFields = ['codigo_tecnico', 'telefono', 'tecnico', 'motivo_llamada',
// 			'select_orden','dpto_colonia','tipo_actividadAdsl','orden_internetAdsl','GeoRefAdsl','trabajado_adsl','obv_adsl','Recibe_adsl',
// 		'materialeAdsl'];

// 			$data = [];

// 			foreach ($selectedFields as $fieldName) {
// 			$value = $request->input($fieldName);
// 			$data[$fieldName] = $value;
// 			}
			
// 				// Agrega el resto de tu código aquí...
// 			$codigo_tecnico = $request->input('codigo_tecnico');
// 			$telefono = $request->input('telefono');
// 			$tecnico = $request->input('tecnico');
// 			$motivo_llamada = $request->input('motivo_llamada');
// 			$select_orden = $request->input('select_orden');
// 			$dpto_colonia = $request->input('dpto_colonia');
// 			$tipo_actividadAdsl = $request->input('tipo_actividadAdsl');
// 			$orden_internetadsl = $request->input('orden_internetadsl');
// 			$GeoRefAdsl  = $request->input('GeoRefAdsl');
// 			$trabajado_adsl = $request->input('trabajado_adsl');
// 			$obv_adsl = $request->input('obv_adsl');
// 			$Recibe_adsl = $request->input('Recibe_adsl');
// 			$materialeAdsl = $request->input('materialeAdsl');
			
// 				// Evaluamos si la tecnología ADSL fue realizada u objetada
// 			if ($tipo_actividadAdsl == 'REALIZADA') {
// 					// Incluimos los datos adicionales para la tecnología ADSL realizada
// 				$DataAdslRealizada = [
// 					'codigo_tecnico' => $codigo_tecnico,
// 					'telefono' => $telefono,
// 					'tecnico' => $tecnico,
// 					'motivo_llamada' => $motivo_llamada,
// 					'select_orden' => $select_orden,
// 					'dpto_colonia' => $dpto_colonia,
// 					'tipo_actividadAdsl' => $tipo_actividadAdsl,
// 					'orden_internetadsl' => $orden_internetadsl,
// 					'GeoRefAdsl' => $GeoRefAdsl,
// 					'trabajado_adsl' => $trabajado_adsl,
// 					'obv_adsl' => $obv_adsl,
// 					'Recibe_adsl' => $Recibe_adsl,
// 					'materialeAdsl' => $materialeAdsl,
// 					];
			
// 					// Guardamos los datos actualizados en el archivo JSON
// 					Storage::put('public/Json/RegistroAdslRealizada.json', json_encode($DataAdslRealizada));
					

					
// 					return view('llamadashome/instalaciones')
// 						->with('success', 'Registro guardado exitosamente.')
// 						->with('page_title', 'Instalaciones - Servicio Guardado')
// 						->with('navigation', 'Instalaciones');
// 				} else if ($tipo_actividadAdsl == 'OBJETADA') {
// 					// Guardamos los datos en un archivo JSON para ADSL Objetada
			
					
// 				}
// 				break;
// 			// En caso de que no se haya seleccionado una tecnología válida, no hacemos nada
// 			break;
// 	}
// }

}

   