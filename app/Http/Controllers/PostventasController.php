<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;


use SSD\Models\Postventas\PostventaCambioNumeroCobreRealizada;
use SSD\Models\Postventas\PostventaCambioNumeroCobreObjetada;
use SSD\Models\Postventas\PostventaCambioNumeroCobreAnulada;
use SSD\Models\Postventas\PostventaRetiroHfcRealizada;
use SSD\Models\Postventas\PostventaRetiroHfcObjetada;
use SSD\Models\Postventas\PostventaRetiroHfcAnulada;
use SSD\Models\Postventas\PostventaMigracionTransferida;
use SSD\Models\Postventas\PostventaMigracionAnulada;
use SSD\Models\Postventas\PostventaMigracionObjetada;
use SSD\Models\Postventas\PostventaMigracionRealizada;
use SSD\Models\Postventas\PostventaCambioEquipoDthAnulada;
use SSD\Models\Postventas\PostventaCambioEquipoDthObjetado;
use SSD\Models\Postventas\PostventaCambioEquipoDthRealizada;
use SSD\Models\Postventas\PostventaCambioEquipoAdslAnulada;
use SSD\Models\Postventas\PostventaCambioEquipoAdslObjetado;
use SSD\Models\Postventas\PostventaCambioEquipoAdslRealizado;

use SSD\Models\Postventas\PostventaCambioEquipoGpon_Anulado;
use SSD\Models\Postventas\PostventaCambioEquipoGpon_Objetado;
use SSD\Models\Postventas\PostventaCambioEquipoGpon_Realizado;
use SSD\Models\Postventas\PostventaCambioEquipoHfc_Anulado;
use SSD\Models\Postventas\PostventaCambioEquipoHfc_Objetado;
use SSD\Models\Postventas\PostventaCambioEquipoHfc_Realizado;

use SSD\Models\Postventas\PostventaAdicionDth_Anulado;
use SSD\Models\Postventas\PostventaAdicionDth_Objetado;
use SSD\Models\Postventas\PostventaAdicionDth_Realizado;
use SSD\Models\Postventas\PostventaAdicionGpon_Anulada;
use SSD\Models\Postventas\PostventaAdicionGpon_Objetado;
use SSD\Models\Postventas\PostventaAdicionGpon_Realizado;
use SSD\Models\Postventas\PostventaAdicionHfc_Anulada;
use SSD\Models\Postventas\PostventaAdicionHfc_Objetado;
use SSD\Models\Postventas\PostventaAdicionHfc_Realizado;

use SSD\Models\Postventas\PostventaTrasladoDthAnulada;
use SSD\Models\Postventas\PostventaTrasladoDth_Objetado;
use SSD\Models\Postventas\PostventaTrasladoDth_Realizado;


use SSD\Models\Postventas\PostventaTrasladoCobre_Anulada;
use SSD\Models\Postventas\PostventaTrasladoCobre_Objetado;
use SSD\Models\Postventas\PostventaTrasladoCobre_Realizado;


use SSD\Models\Postventas\PostventaTrasladoAdsl_Anulada;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Realizado;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Objetado;

use SSD\Models\Postventas\PostventaTrasladoGpon_Anulado;
use SSD\Models\Postventas\PostventaTrasladoGpon_Transferido;
use SSD\Models\Postventas\PostventaTrasladoGpon_Objetado;
use SSD\Models\Postventas\PostventaTrasladoGpon_Realizado;

use SSD\Models\Postventas\PostventaTrasladoHfc_Transferido;
use SSD\Models\Postventas\PostventaTrasladoHfc_Anulado;
use SSD\Models\Postventas\PostventaTrasladoHfc_Objetado;
use SSD\Models\Postventas\PostventaTrasladoHfc_Realizado;





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
			case 'TRASLADO|HFC':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'tecnologia',
					'TipoActividadTrasladoHfc',
					'OrdenTvTrasladoHfc',
					'OrdenInternetTrasladoHfc',
					'OrdenLineaTrasladoHfc',
					'ObservacionesTrasladoHfc',
					'TrabajadoTrasladoHfc',
					'RecibeHfcRealizado',
					'NodoTrasladoHfc',
					'TapTrasladoHfc',
					'PosicionTrasladoHfc',
					'MaterialesTrasladoHfc',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoTrasladoHfc' && $request->has('TrabajadoTrasladoHfc')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoTrasladoHfc') {
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
                if ($data['TipoActividadTrasladoHfc'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataTrasladoHfcRealizada = new PostventaTrasladoHfc_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataTrasladoHfcRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadTrasladoHfc'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoHfc',
						'OrdenTvObjetadoTrasladoHfc',
						'OrdenIntObjTrasladoHfc',
						'OrdenLineaObjetadoTrasladoHfc',
						'MotivoObjTrasladoHfc',
						'TrabajadoObjTrasladoHfc',
						'ObvsObjTrasladoHfc',
						'ComentariosObjTrasladoHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjTrasladoHfc' && $request->has('TrabajadoObjTrasladoHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjTrasladoHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoHfcObj = new PostventaTrasladoHfc_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataTrasladoHfcObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadTrasladoHfc'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoHfc',
						'OrdenTvAnulTraslHfc',
						'OrdenInterAnulTraslHfc',
						'OrdenLineaAnulTraslHfc',
						'MotivoAnuladaTraslado_Hfc',
						'TrabajadoAnuladaTraslado_Hfc',
						'ComenAnuladaTraslado_Hfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnuladaTraslado_Hfc' && $request->has('TrabajadoAnuladaTraslado_Hfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnuladaTraslado_Hfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoHfcAnulada = new PostventaTrasladoHfc_Anulado($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoHfcAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}elseif($data['TipoActividadTrasladoHfc'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoHfc',
						'OrdenTvTransferidoHfc',
						'OrdenInternetTransferidoHfc',
						'OrdenLineaTransferidoHfc',
						'MotivoTransTrasladoHfc',
						'TrabajadoTransTrasladoHfc',
						'ComentarioTrasladoTransHfc',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransTrasladoHfc' && $request->has('TrabajadoTransTrasladoHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransTrasladoHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoHfcTransferida = new PostventaTrasladoHfc_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoHfcTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
			case 'TRASLADO|GPON':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'tecnologia',
					'TipoActividadTrasladoGpon',
					'OrdenTvTrasladoGpon',
					'OrdenInternetTrasladoGpon',
					'OrdenLineaTrasladoGpon',
					'ObvsTrasladoGpon',
					'TrabajadoTrasladoGpon',
					'RecibeTrasladoGpon',
					'NodoTrasladoGpon',
					'TapTrasladoGpon',
					'PosicionTrasladoGpon',
					'MaterialesTrasladoGpon',
					'username_creacion',
					'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoTrasladoGpon' && $request->has('TrabajadoTrasladoGpon')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoTrasladoGpon') {
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
                if ($data['TipoActividadTrasladoGpon'] == 'REALIZADA') {
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataTrasladoGponRealizada = new PostventaTrasladoGpon_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataTrasladoGponRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

						
                }elseif($data['TipoActividadTrasladoGpon'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoGpon',
						'OrdenTvTrasladoObjGpon',
						'OrdenInterObjTraslGpon',
						'OrdenLineaTraslObjGpon',
						'MotivoObjTrasladoGpon',
						'TrabajadoTrasladoObjGpon',
						'ObvsTrasladoObjGpon',
						'ComentTrasladoObjGpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTrasladoObjGpon' && $request->has('TrabajadoTrasladoObjGpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTrasladoObjGpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoGponObj = new postventaTrasladoGpon_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataTrasladoGponObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'Postventas');

				
				}elseif($data['TipoActividadTrasladoGpon'] == 'ANULACION'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoGpon',
						'OrdenTvTraslAnuladoGpon',
						'OrdenIntTrasladoAnulGpon',
						'OrdenLineaTraslAnulGpon',
						'MotivoTrasladoAnulada_Gpon',
						'TrabajadoAnuladaTraslado_gpon',
						'ComentarioTrasladoAnulada_Gpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoAnuladaTraslado_gpon' && $request->has('TrabajadoAnuladaTraslado_gpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoAnuladaTraslado_gpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoGponAnulada = new PostventaTrasladoGpon_Anulado($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoGponAnulada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO ANULACION COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}elseif($data['TipoActividadTrasladoGpon'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoGpon',
						'OrdenTvTrasladoTransGpon',
						'OrdenIntTransladoGpon',
						'OrdenLineaTrasladoTransGpon',
						'MotivoTransTrasladoGpon',
						'TrabajadoTraslTransGpon',
						'ComentTrasladoTransGpon',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTraslTransGpon' && $request->has('TrabajadoTraslTransGpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTraslTransGpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoGponTransferida = new PostventaTrasladoGpon_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataTrasladoGponTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/postventa')
						->with('message', $message)
						->with('messages', $messages)
						->with('page_title', 'Postventas - Registro')
						->with('navigation', 'postventa');

				}
                break;
			case 'TRASLADO|ADSL':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'Select_Postventa',
					'select_orden',
					'dpto_colonia',
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
					'TipoActividadTrasladoCobre',
					'OrdenTrasladoCobre',
					'GeorefTrasladoCobre',
					'MaterialesTrasladoCobre',
					'TrabajadoTrasladoCobre',
					'ObvsTrasladoCobre',
					'RecibeTrasladoCobre',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
						'TipoActividadTrasladoDth',
						'MotivoTrasladoAnulada_Dth',
						'OrdenTrasladosDth',
						'TrabajadoTrasladoAnulada_Dth',
						'ComentarioTrasladoAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTrasladoAnulada_Dth' && $request->has('TrabajadoTrasladoAnulada_Dth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTrasladoAnulada_Dth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataTrasladoDthAnulada = new PostventaTrasladoDthAnulada($data);

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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
					'TipoActividadCambioDth',
					'InstalacionEquipoDth',
					'DesinstalarEquipoDth',
					'OrdenEquipoDth',
					'ObvsEquipoDth',
					'RecibeEquipoDth',
					'TrabajadoEquipoDth',
					'username_creacion',
					'username_atencion',

				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoEquipoDth' && $request->has('TrabajadoEquipoDth')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoEquipoDth') {
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
						'tecnologia',
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
					'tecnologia',
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
						'tecnologia',
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
							'tecnologia',
							'TipoActividadCambioNumeroCobre',
							'MotivoAnuladaCambioCobre',
							'OrdenAnuladaCambioCobre',
							'TrabajadoAnuladaCambioCobre',
							'ObvsObjCambioCobre',
							'ComentarioAnuladaCambioCobre'
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