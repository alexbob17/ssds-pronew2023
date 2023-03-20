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
use SSD\Models\PostventaCambioEquipoDthAnulada;
use SSD\Models\PostventaCambioEquipoDthObjetado;
use SSD\Models\PostventaCambioEquipoDthRealizada;
use SSD\Models\PostventaCambioEquipoAdslAnulada;
use SSD\Models\PostventaCambioEquipoAdslObjetado;
use SSD\Models\PostventaCambioEquipoAdslRealizado;

use SSD\Models\PostventaCambioEquipoGpon_Anulado;
use SSD\Models\PostventaCambioEquipoGpon_Objetado;
use SSD\Models\PostventaCambioEquipoGpon_Realizado;
use SSD\Models\PostventaCambioEquipoHfc_Anulado;
use SSD\Models\PostventaCambioEquipoHfc_Objetado;
use SSD\Models\PostventaCambioEquipoHfc_Realizado;

use SSD\Models\PostventaAdicionDth_Anulado;
use SSD\Models\PostventaAdicionDth_Objetado;
use SSD\Models\PostventaAdicionDth_Realizado;
use SSD\Models\PostventaAdicionGpon_Anulada;
use SSD\Models\PostventaAdicionGpon_Objetado;
use SSD\Models\PostventaAdicionGpon_Realizado;
use SSD\Models\PostventaAdicionHfc_Anulada;
use SSD\Models\PostventaAdicionHfc_Objetado;
use SSD\Models\PostventaAdicionHfc_Realizado;

use SSD\Models\PostventaTrasladoDth_Anulada;
use SSD\Models\PostventaTrasladoDth_Objetado;
use SSD\Models\PostventaTrasladoDth_Realizado;


use SSD\Models\PostventaTrasladoCobre_Anulada;
use SSD\Models\PostventaTrasladoCobre_Objetado;
use SSD\Models\PostventaTrasladoCobre_Realizado;


use SSD\Models\Postventas\PostventaTrasladoAdsl_Anulada;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Realizado;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Objetado;





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
			case 'TRASLADO|ADSL':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadTrasladoAdsl',
					'NOrdenTrasladosAdsl',
					'GeorefTrasladoAdsl',
					'MaterialesTrasladoAdsl',
					'TrabajadoTrasladoAdsl',
					'ObvsTrasladoAdsl',
					'RecibeTrasladoAdsl',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoTrasladoAdsl' && $request->has('TrabajadoTrasladoAdsl')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoTrasladoAdsl') {
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
                if ($data['TipoActividadTrasladoAdsl'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataTrasladoAdslRealizada = new PostventaTrasladoAdsl_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataTrasladoAdslRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadTrasladoAdsl'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadTrasladoAdsl',
						'MotivoObjTrasladoAdsl',
						'OrdenObjTrasladoAdsl',
						'TrabajadoTrasladoObjAdsl',
						'ObvsTrasladoObjAdsl',
						'ComentariosTrasladosObjAdsl',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTrasladoObjAdsl' && $request->has('TrabajadoTrasladoObjAdsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTrasladoObjAdsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoAdslObj = new PostventaTrasladoAdsl_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataTrasladoAdslObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadTrasladoAdsl'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadTrasladoAdsl',
						'MotivoTrasladoAnulada_Adsl',
						'NOrdenTrasladosAnulAdsl',
						'TrabajadoAnulada_Adsl',
						'ComentarioTrasladoAnulada_Adsl',
						'username_creacion',
						'username_atencion',
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



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoAdslAnulada = new PostventaTrasladoAdsl_Anulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoAdslAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;
			case 'TRASLADO|COBRE':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadTrasladoCobre',
					'OrdenTrasladoCobre',
					'GeorefTrasladoCobre',
					'MaterialesTrasladoCobre',
					'TrabajadoTrasladoCobre',
					'ObvsTrasladoCobre',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoTrasladoCobre' && $request->has('TrabajadoTrasladoCobre')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoTrasladoCobre') {
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
                if ($data['TipoActividadTrasladoCobre'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataTrasladoCobreRealizada = new PostventaTrasladoCobre_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataTrasladoCobreRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadTrasladoCobre'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadTrasladoCobre',
						'MotivoObjTrasladoCobre',
						'OrdenTrasladoObjCobres',
						'TrabajadoTrasladoObjCobre',
						'ObsObjTrasladoCobre',
						'ComentariosObjTrasladoCobre',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTrasladoObjCobre' && $request->has('TrabajadoTrasladoObjCobre')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTrasladoObjCobre') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoCobreObj = new PostventaTrasladoCobre_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataTrasladoCobreObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadTrasladoCobre'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadTrasladoCobre',
						'MotivoTrasladoAnulada_Cobre',
						'OrdenTrasladosCobre',
						'TrabajadoAnulada_Cobre',
						'ComentarioTrasladoAnulada_Cobre',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnulada_Cobre' && $request->has('TrabajadoAnulada_Cobre')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnulada_Cobre') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoCobreAnulada = new PostventaTrasladoCobre_Anulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoCobreAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;
			case 'TRASLADO|DTH':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadTrasladoDth',
					'OrdenTrasladoDth',
					'GeorefTrasladoDth',
					'MaterialesTrasladoDth',
					'TrabajadoTrasladoDth',
					'ObvsTrasladoDth',
					'RecibeTrasladoDth',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoTrasladoDth' && $request->has('TrabajadoTrasladoDth')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoTrasladoDth') {
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
                if ($data['TipoActividadTrasladoDth'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataTrasladoDthRealizada = new PostventaTrasladoDth_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataTrasladoDthRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadTrasladoDth'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadTrasladoDth',
						'MotivoObjTrasladoDth',
						'OrdenTrasladoObjDth',
						'TrabajadoTrasladoObj_Dth',
						'ObvsTrasladoObjDth',
						'ComentariosTrasladoObjDth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTrasladoObj_Dth' && $request->has('TrabajadoTrasladoObj_Dth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTrasladoObj_Dth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoDthObj = new PostventaTrasladoDth_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataTrasladoDthObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadTrasladoDth'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadTrasladoDth',
						'MotivoTrasladoAnulada_Dth',
						'OrdenTrasladosDth',
						'TrabajadoTrasladoAnulada_Hfc',
						'ComentariosTrasladoObjDth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TipoActividadTrasladoDth' && $request->has('TipoActividadTrasladoDth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TipoActividadTrasladoDth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoDthAnulada = new PostventaTrasladoDth_Anulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoDthAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;
			case 'ADICION|HFC':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadAdicionHfc',
					'equipostvAdicionHfc1',
					'equipostvAdicionHfc2',
					'equipostvAdicionHfc3',
					'equipostvAdicionHfc4',
					'equipostvAdicionHfc5',
					'NOrdenAdicionHfc',
					'TrabajadoAdicionHfc',
					'obvsAdicionHfc',
					'RecibeAdicionHfc',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoAdicionHfc' && $request->has('TrabajadoAdicionHfc')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoAdicionHfc') {
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
                if ($data['TipoActividadAdicionHfc'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataAdicionHfcRealizada = new PostventaAdicionHfc_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataAdicionHfcRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadAdicionHfc'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadAdicionHfc',
						'MotivoObjAdicionHfc',
						'OrdenAdicionObjHfc',
						'TrabajadoObjAdicionHfc',
						'ObvsAdicionObjHfc',
						'ComentariosObjAdicionHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjAdicionHfc' && $request->has('TrabajadoObjAdicionHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjAdicionHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdicionHfcObj = new PostventaAdicionHfc_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataAdicionHfcObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadAdicionHfc'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadAdicionHfc',
						'MotivoAdicionAnulada_Hfc',
						'NOrdenAdicionAnuladaHfc',
						'TrabajadoAdicionAnulada_Hfc',
						'ComentarioAdicionAnulada_Hfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAdicionAnulada_Hfc' && $request->has('TrabajadoAdicionAnulada_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAdicionAnulada_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdicionHfcAnulada = new PostventaAdicionHfc_Anulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdicionHfcAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;

			case 'ADICION|GPON':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadAdicionGpon',
					'equipostvAdicionGpon1',
					'equipostvAdicionGpon2',
					'equipostvAdicionGpon3',
					'equipostvAdicionGpon4',
					'equipostvAdicionGpon5',
					'NOrdenAdicionGpon',
					'TrabajadoAdicionGpon',
					'ObvsAdicionGpon',
					'RecibeAdicionGpon',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoAdicionGpon' && $request->has('TrabajadoAdicionGpon')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoAdicionGpon') {
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
                if ($data['TipoActividadAdicionGpon'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataAdicionGponRealizada = new PostventaAdicionGpon_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataAdicionGponRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadAdicionGpon'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadAdicionGpon',
						'MotivoAdicionObjGpon',
						'NOrdenAdicionObjGpon',
						'TrabajadoAdicionObjGpon',
						'ObvsAdicionObjGpon',
						'ComentariosAdicionObjGpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAdicionObjGpon' && $request->has('TrabajadoAdicionObjGpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAdicionObjGpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdicionGponObj = new PostventaAdicionGpon_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataAdicionGponObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadAdicionGpon'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadAdicionGpon',
						'MotivoAdicionAnulada_Gpon',
						'NOrdenAdicionAnuladaGpon',
						'TrabajadoAdicionAnulada_Gpon',
						'ComentarioAdicionAnulada_Gpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAdicionAnulada_Gpon' && $request->has('TrabajadoAdicionAnulada_Gpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAdicionAnulada_Gpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdicionGponAnulada = new PostventaAdicionGpon_Anulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdicionGponAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;

			case 'ADICION|DTH':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadAdicionDth',
					'equipostvAdicionDth1',
					'equipostvAdicionDth2',
					'equipostvAdicionDth3',
					'equipostvAdicionDth4',
					'equipostvAdicionDth5',
					'NOrdenAdicionDth',
					'TrabajadoAdicionDth',
					'ObvsAdicionDth',
					'RecibeAdicionDth',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoAdicionDth' && $request->has('TrabajadoAdicionDth')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoAdicionDth') {
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
                if ($data['TipoActividadAdicionDth'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataAdicionDthRealizada = new PostventaAdicionDth_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataAdicionDthRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadAdicionDth'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadAdicionDth',
						'MotivoObjAdicionDth',
						'NOrdenAdicionObjDth',
						'TrabajadoAdicionObjDth',
						'ObvsAdicionObjDth',
						'ComentariosAdicionObjDth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAdicionObjDth' && $request->has('TrabajadoAdicionObjDth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAdicionObjDth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdicionDthObj = new PostventaAdicionDth_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataAdicionDthObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadAdicionDth'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadAdicionDth',
						'MotivoAdicionAnulada_Dth',
						'OrdenAdicionAnulada_Dth',
						'TrabajadoAdicionAnulada_Dth',
						'ComentarioAdicionAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAdicionAnulada_Dth' && $request->has('TrabajadoAdicionAnulada_Dth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAdicionAnulada_Dth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdicionDthAnulada = new PostventaAdicionDth_Anulado($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdicionDthAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;

			case 'CAMBIO DE EQUIPO|HFC':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadCambioHfc',
					'InstalacionEquipoHfc',
					'DesinstalarEquipoHfc',
					'NOrdenEquipoHfc',
					'ObvsEquipoHfc',
					'RecibeEquipoHfc',
					'TrabajadoEquipoHfc',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoEquipoHfc' && $request->has('TrabajadoEquipoHfc')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoEquipoHfc') {
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
                if ($data['TipoActividadCambioHfc'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataCambioEquipoHfcRealizada = new PostventaCambioEquipoHfc_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataCambioEquipoHfcRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadCambioHfc'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioHfc',
						'MotivoEquipoObjHfc',
						'NordenObjEquipoHfc',
						'TrabajadoObjEquipoHfc',
						'ObvsObjEquipoHfc',
						'ComentsEquipoObjHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjEquipoHfc' && $request->has('TrabajadoObjEquipoHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjEquipoHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoHfcObj = new PostventaCambioEquipoHfc_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoHfcObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadCambioHfc'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioHfc',
						'MotivoEquipoAnulada_Hfc',
						'OrdenAnuladaEquipoHfc',
						'TrabajadoEquipoAnulada_Hfc',
						'ComentarioAnuladaEquipoHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoEquipoAnulada_Hfc' && $request->has('TrabajadoEquipoAnulada_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoEquipoAnulada_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoHfcAnulada = new PostventaCambioEquipoHfc_Anulado($data);

                    // Guardamos la instancia en la base de datos
                    $dataCambioEquipoHfcAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;

			case 'CAMBIO DE EQUIPO|GPON':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadCambioGpon',
					'InstalacionEquipoGpon',
					'DesinstalarEquipoGpon',
					'NOrdenEquipoGpon',
					'ObvsEquipoGpon',
					'RecibeEquipoGpon',
					'TrabajadoEquipoGpon',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoEquipoGpon' && $request->has('TrabajadoEquipoGpon')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoEquipoGpon') {
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
                if ($data['TipoActividadCambioGpon'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataCambioEquipoGponRealizada = new PostventaCambioEquipoGpon_Realizado($data);

                    // Guardamos la instancia en la base de datos
                    $dataCambioEquipoGponRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadCambioGpon'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioGpon',
						'MotivoObjEquipoGpon',
						'NOrdenObjEquipoGpon',
						'TrabajadoObjEquipoGpon',
						'ObvsEquipoObjGpon',
						'ComentsEquipoObjGpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjEquipoGpon' && $request->has('TrabajadoObjEquipoGpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjEquipoGpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoGponObj = new PostventaCambioEquipoGpon_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoGponObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadCambioGpon'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioGpon',
						'MotivoAnuladaObj_Gpon',
						'OrdenEquipoAnuladaGpon',
						'TrabajadoEquipoAnulada_Gpon',
						'ComentarioEquipoAnulada_Gpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoEquipoAnulada_Gpon' && $request->has('TrabajadoEquipoAnulada_Gpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoEquipoAnulada_Gpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoGponAnulada = new PostventaCambioEquipoGpon_Anulado($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoGponAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				break;
			case 'CAMBIO DE EQUIPO|ADSL':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadCambioAdsl',
					'InstalacionEquipoAdsl',
					'DesinstalarEquipoAdsl',
					'OrdenEquipoAdsl',
					'ObvsEquipoAdsl',
					'RecibeEquipoAdsl',
					'TrabajadoEquipoAdsl',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoEquipoAdsl' && $request->has('TrabajadoEquipoAdsl')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoEquipoAdsl') {
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
                if ($data['TipoActividadCambioAdsl'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataCambioEquipoAdslRealizada = new PostventaCambioEquipoAdslRealizado($data);

                    // Guardamos la instancia en la base de datos
                    $dataCambioEquipoAdslRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadCambioAdsl'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioAdsl',
						'MotivoEquipoObjAdsl',
						'OrdenEquipoObjAdsl',
						'TrabajadoEquipoObjAdsl',
						'ObvsEquipoObjAdsl',
						'ComentsEquipoObjAdsl',
						'username_creacion',
						'username_atencion'
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoEquipoObjAdsl' && $request->has('TrabajadoEquipoObjAdsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoEquipoObjAdsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoAdslObj = new PostventaCambioEquipoAdslObjetado($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoAdslObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadCambioAdsl'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioAdsl',
						'MotivoEquipoAnulada_Adsl',
						'OrdenAnuladaEquipoAdsl',
						'TrabajadoEquipoAnulada_Adsl',
						'ComentsEquipoAnulada_Adsl',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoEquipoAnulada_Adsl' && $request->has('TrabajadoEquipoAnulada_Adsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoEquipoAnulada_Adsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoAdslAnulada = new PostventaCambioEquipoAdslAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoAdslAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				break;
			case 'CAMBIO DE EQUIPO|DTH':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'TipoActividadCambioDth',
					'MotivoObjEquipoDth',
					'OrdenEquipoObjDth',
					'TrabajadoEquipoObjDth',
					'ObvsEquipoObjDth',
					'ComentsEquipoObjDth',
					'username_creacion',
					'username_atencion',

				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoEquipoObjDth' && $request->has('TrabajadoEquipoObjDth')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoEquipoObjDth') {
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
                if ($data['TipoActividadCambioDth'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataCambioEquipoRealizada = new PostventaCambioEquipoDthRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataCambioEquipoRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadCambioDth'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioDth',
						'MotivoObjEquipoDth',
						'OrdenEquipoObjDth',
						'TrabajadoEquipoObjDth',
						'ObvsEquipoObjDth',
						'ComentsEquipoObjDth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoEquipoObjDth' && $request->has('TrabajadoEquipoObjDth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoEquipoObjDth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoDthObj = new PostventaCambioEquipoDthObjetado($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoDthObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadCambioDth'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'TipoActividadCambioDth',
						'MotivoEquipoAnulada_Dth',
						'OrdenEquipoAnulada_Dth',
						'TrabajadoEquipoAnulada_Dth',
						'ComentarioEquipoAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoEquipoAnulada_Dth' && $request->has('TrabajadoEquipoAnulada_Dth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoEquipoAnulada_Dth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCambioEquipoDthAnulada = new PostventaCambioEquipoDthAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataCambioEquipoDthAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				break;
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
					$messages = "REGISTRO REALIZADO COMPLETO";
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
					$messages = "REGISTRO OBJETADO COMPLETO";
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
					$messages = "REGISTRO ANULADO COMPLETO";
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
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
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
					$messages = "REGISTRO REALIZADO COMPLETO";
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
					$messages = "REGISTRO OBJETADO COMPLETO";
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
					$messages = "REGISTRO ANULADO COMPLETO";
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
					$messages = "REGISTRO REALIZADO COMPLETO";
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
					$messages = "REGISTRO OBJETADO COMPLETO";
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
					$messages = "REGISTRO ANULADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
				
                break;    
			default:
            break;
        }

        // Redireccionamos a la página de inicio
        return redirect('/');
    }
}