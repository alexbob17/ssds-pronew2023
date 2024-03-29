<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


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

use SSD\Models\Instalaciones\InstalacionesRefresh;

use SSD\Models\Instalaciones\InstalacionesDthRefresh;

use Illuminate\Support\Str;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

use SSD\Tableconfig;


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

	public function showReparaciones()
	{		
		$breadcrumb = [
				['name' => 'Reparaciones - Saturado' ]
		];		
		
		return view('llamadashome/reparaciones')
			->with('page_title', 'Reparaciones - Registro')
			->with('navigation', 'Reparaciones');	
	}

	public function showAgendamientos()
	{		
		$breadcrumb = [
				['name' => 'Agendamientos - Saturado' ]
		];		
		
		return view('llamadashome/agendamientos')
			->with('page_title', 'Agendamientos - Registro')
			->with('navigation', 'Agendamientos');	
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
					'tecnologia',
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
					'username_creacion',
					'username_atencion',
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
					
	
					$numeroOrden = $data['orden_tv_hfc'];
					$numeroOrden1 = $data['orden_internet_hfc'];
					$numeroOrden2 = $data['orden_linea_hfc'];
	
					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];
	
					foreach ($tables as $table => $ordenFields) {
							if (array_key_exists($table, $trabajadoFields)) {
								foreach ($ordenFields as $ordenField) {
									if (in_array($ordenField, $allFields)) {
										$trabajadoField = $trabajadoFields[$table];
										$existente = false;
										
										foreach ($numerosOrden as $numero) {
											if (!is_null($numero)) {
												$existente = DB::table($table)
													->where($ordenField, $numero)
													->where($trabajadoField, 'PENDIENTE')
													->exists();
	
												if ($existente) {
													break;
												}
											}
										}
										
										$existentes[$table][] = $existente;
									}
								}
							}
					}
	
					$existePendiente = false;
					foreach ($existentes as $table => $records) {
							if (in_array(true, $records)) {
								$existePendiente = true;
								break;
							}
					}
	
					if ($existePendiente) {
							$message = '¡ERROR!';
							$messages = 'BOLETA YA REGISTRADA PENDIENTE';
							return view('llamadashome/instalaciones', compact('message', 'messages'))
								->with('page_title', 'Instalaciones - Registro')
								->with('navigation', 'Instalaciones');
					}
	
					$data['codigoUnico'] = mt_rand(10000000, 99999999);
	
					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataHfcRealizada = new InstalacionHfcRealizada($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcRealizada->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO HFC COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'MotivoObjetada_Hfc',
						'TrabajadoObjetadaHfc',
						'ComentariosObjetados_Hfc',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['orden_tv_hfc'];
					$numeroOrden1 = $data['orden_internet_hfc'];
					$numeroOrden2 = $data['orden_linea_hfc'];

					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];

					foreach ($tables as $table => $ordenFields) {
							if (array_key_exists($table, $trabajadoFields)) {
								foreach ($ordenFields as $ordenField) {
									if (in_array($ordenField, $allFields)) {
										$trabajadoField = $trabajadoFields[$table];
										$existente = false;
										
										foreach ($numerosOrden as $numero) {
											if (!is_null($numero)) {
												$existente = DB::table($table)
													->where($ordenField, $numero)
													->where($trabajadoField, 'PENDIENTE')
													->exists();

												if ($existente) {
													break;
												}
											}
										}
										
										$existentes[$table][] = $existente;
									}
								}
							}
					}

					$existePendiente = false;
					foreach ($existentes as $table => $records) {
							if (in_array(true, $records)) {
								$existePendiente = true;
								break;
							}
					}

					if ($existePendiente) {
							$message = '¡ERROR!';
							$messages = 'BOLETA YA REGISTRADA PENDIENTE';
							return view('llamadashome/instalaciones', compact('message', 'messages'))
								->with('page_title', 'Instalaciones - Registro')
								->with('navigation', 'Instalaciones');
					}


					$data['codigoUnico'] = mt_rand(10000000, 99999999);
					
					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;
					

					$dataHfcObjetada = new InstalacionHfcObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO HFC OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'TrabajadoTransferido_Hfc',
						'MotivoTransferidoHfc',
						'ComentariosTransferida_Hfc',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['orden_tv_hfc'];
					$numeroOrden1 = $data['orden_internet_hfc'];
					$numeroOrden2 = $data['orden_linea_hfc'];

					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];

					foreach ($tables as $table => $ordenFields) {
							if (array_key_exists($table, $trabajadoFields)) {
								foreach ($ordenFields as $ordenField) {
									if (in_array($ordenField, $allFields)) {
										$trabajadoField = $trabajadoFields[$table];
										$existente = false;
										
										foreach ($numerosOrden as $numero) {
											if (!is_null($numero)) {
												$existente = DB::table($table)
													->where($ordenField, $numero)
													->where($trabajadoField, 'PENDIENTE')
													->exists();

												if ($existente) {
													break;
												}
											}
										}
										
										$existentes[$table][] = $existente;
									}
								}
							}
					}

					$existePendiente = false;
					foreach ($existentes as $table => $records) {
							if (in_array(true, $records)) {
								$existePendiente = true;
								break;
							}
					}

					if ($existePendiente) {
							$message = '¡ERROR!';
							$messages = 'BOLETA YA REGISTRADA PENDIENTE';
							return view('llamadashome/instalaciones', compact('message', 'messages'))
								->with('page_title', 'Instalaciones - Registro')
								->with('navigation', 'Instalaciones');
					}

					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataHfcTransferida= new InstalacionHfcTransferida($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcTransferida->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO HFC TRANSFERIDO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividad',
						'MotivoAnulada_Hfc',
						'orden_internet_hfc',
						'orden_tv_hfc',
						'orden_linea_hfc',
						'TrabajadoAnulada_Hfc',
						'ComentarioAnulada_Hfc',
						'username_creacion',
						'username_atencion',
						'codigoUnico',

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


					 // Generamos un código único de 8 caracteres
					// dd($data);
					$numeroOrden = $data['orden_tv_hfc'];
					$numeroOrden1 = $data['orden_internet_hfc'];
					$numeroOrden2 = $data['orden_linea_hfc'];

					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];

					foreach ($tables as $table => $ordenFields) {
							if (array_key_exists($table, $trabajadoFields)) {
								foreach ($ordenFields as $ordenField) {
									if (in_array($ordenField, $allFields)) {
										$trabajadoField = $trabajadoFields[$table];
										$existente = false;
										
										foreach ($numerosOrden as $numero) {
											if (!is_null($numero)) {
												$existente = DB::table($table)
													->where($ordenField, $numero)
													->where($trabajadoField, 'PENDIENTE')
													->exists();

												if ($existente) {
													break;
												}
											}
										}
										
										$existentes[$table][] = $existente;
									}
								}
							}
					}

					$existePendiente = false;
					foreach ($existentes as $table => $records) {
							if (in_array(true, $records)) {
								$existePendiente = true;
								break;
							}
					}

					if ($existePendiente) {
							$message = '¡ERROR!';
							$messages = 'BOLETA YA REGISTRADA PENDIENTE';
							return view('llamadashome/instalaciones', compact('message', 'messages'))
								->with('page_title', 'Instalaciones - Registro')
								->with('navigation', 'Instalaciones');
					}

					 // Generamos un código único de 8 caracteres
					 $data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataHfcAnulada = new InstalacionHfcAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataHfcAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO HFC ANULACION COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
					
                }elseif ($data['tipo_actividad'] == 'REFRESH') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'refreshSelect',
						'ComentarioRefresh_Hfc',
						'username_creacion',
						'username_atencion',

					];
	
					$data = [];

					$data = $request->only($selectedFields);

					$data['codigoUnico'] = mt_rand(10000000, 99999999);
					// dd($data);
					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataHfcRefresh= new InstalacionesRefresh($data);

                    // Guardamos la instancia en la base de datos
                    $dataHfcRefresh->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO REFRESH COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
					'tecnologia',
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
					'username_creacion',
					'username_atencion',
					'codigoUnico',
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

				$numeroOrden = $data['OrdenInternet_Gpon'];
				$numeroOrden1 = $data['OrdenTv_Gpon'];
				$numeroOrden2 = $data['OrdenLinea_Gpon'];

				$trabajadoFields = Tableconfig::getTrabajadoFields();
				$tables = Tableconfig::getTablesAll();
				$allFields = Tableconfig::getAllFields();
				$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
				$existentes = [];

				foreach ($tables as $table => $ordenFields) {
						if (array_key_exists($table, $trabajadoFields)) {
							foreach ($ordenFields as $ordenField) {
								if (in_array($ordenField, $allFields)) {
									$trabajadoField = $trabajadoFields[$table];
									$existente = false;
									
									foreach ($numerosOrden as $numero) {
										if (!is_null($numero)) {
											$existente = DB::table($table)
												->where($ordenField, $numero)
												->where($trabajadoField, 'PENDIENTE')
												->exists();

											if ($existente) {
												break;
											}
										}
									}
									
									$existentes[$table][] = $existente;
								}
							}
						}
				}

				$existePendiente = false;
				foreach ($existentes as $table => $records) {
						if (in_array(true, $records)) {
							$existePendiente = true;
							break;
						}
				}

				if ($existePendiente) {
						$message = '¡ERROR!';
						$messages = 'BOLETA YA REGISTRADA PENDIENTE';
						return view('llamadashome/instalaciones', compact('message', 'messages'))
							->with('page_title', 'Instalaciones - Registro')
							->with('navigation', 'Instalaciones');
				}

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;


				$data['codigoUnico'] = mt_rand(10000000, 99999999);

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
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadGpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'MotivoObjetado_Gpon',
						'TrabajadoGpon_Objetado',
						'ComentariosGpon_Objetada',
						'username_creacion',
						'username_atencion',
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
					$numeroOrden = $data['OrdenInternet_Gpon'];
					$numeroOrden1 = $data['OrdenTv_Gpon'];
					$numeroOrden2 = $data['OrdenLinea_Gpon'];

					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];

					foreach ($tables as $table => $ordenFields) {
						if (array_key_exists($table, $trabajadoFields)) {
							foreach ($ordenFields as $ordenField) {
								if (in_array($ordenField, $allFields)) {
									$trabajadoField = $trabajadoFields[$table];
									$existente = false;
									
									foreach ($numerosOrden as $numero) {
										if (!is_null($numero)) {
											$existente = DB::table($table)
												->where($ordenField, $numero)
												->where($trabajadoField, 'PENDIENTE')
												->exists();

											if ($existente) {
												break;
											}
										}
									}
									
									$existentes[$table][] = $existente;
								}
							}
						}
					}

					$existePendiente = false;
					foreach ($existentes as $table => $records) {
						if (in_array(true, $records)) {
							$existePendiente = true;
							break;
						}
					}

					if ($existePendiente) {
						$message = '¡ERROR!';
						$messages = 'BOLETA YA REGISTRADA PENDIENTE';
						return view('llamadashome/instalaciones', compact('message', 'messages'))
							->with('page_title', 'Instalaciones - Registro')
							->with('navigation', 'Instalaciones');
					}


					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataGponObjetada = new InstalacionGponObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataGponObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadGpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'MotivoTransferidoGpon',
						'TrabajadoTransferido_Gpon',
						'ComentarioTransferido_Gpon',
						'username_creacion',
						'username_atencion',

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
					$numeroOrden = $data['OrdenInternet_Gpon'];
					$numeroOrden1 = $data['OrdenTv_Gpon'];
					$numeroOrden2 = $data['OrdenLinea_Gpon'];

					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];

					foreach ($tables as $table => $ordenFields) {
						if (array_key_exists($table, $trabajadoFields)) {
							foreach ($ordenFields as $ordenField) {
								if (in_array($ordenField, $allFields)) {
									$trabajadoField = $trabajadoFields[$table];
									$existente = false;
									
									foreach ($numerosOrden as $numero) {
										if (!is_null($numero)) {
											$existente = DB::table($table)
												->where($ordenField, $numero)
												->where($trabajadoField, 'PENDIENTE')
												->exists();

											if ($existente) {
												break;
											}
										}
									}
									
									$existentes[$table][] = $existente;
								}
							}
						}
					}

					$existePendiente = false;
					foreach ($existentes as $table => $records) {
						if (in_array(true, $records)) {
							$existePendiente = true;
							break;
						}
					}

					if ($existePendiente) {
						$message = '¡ERROR!';
						$messages = 'BOLETA YA REGISTRADA PENDIENTE';
						return view('llamadashome/instalaciones', compact('message', 'messages'))
							->with('page_title', 'Instalaciones - Registro')
							->with('navigation', 'Instalaciones');
					}

					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataGponTransferida= new InstalacionGponTransferida($data);

                    // Guardamos la instancia en la base de datos
                    $dataGponTransferida->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON TRANSFERIDO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadGpon',
						'MotivoAnulada_Gpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'TrabajadoAnulada_Gpon',
						'ComentarioAnulada_Gpon',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['OrdenInternet_Gpon'];
					$numeroOrden1 = $data['OrdenTv_Gpon'];
					$numeroOrden2 = $data['OrdenLinea_Gpon'];

					$trabajadoFields = Tableconfig::getTrabajadoFields();
					$tables = Tableconfig::getTablesAll();
					$allFields = Tableconfig::getAllFields();
					$numerosOrden = [$numeroOrden, $numeroOrden1, $numeroOrden2];
					$existentes = [];

					foreach ($tables as $table => $ordenFields) {
						if (array_key_exists($table, $trabajadoFields)) {
							foreach ($ordenFields as $ordenField) {
								if (in_array($ordenField, $allFields)) {
									$trabajadoField = $trabajadoFields[$table];
									$existente = false;
									
									foreach ($numerosOrden as $numero) {
										if (!is_null($numero)) {
											$existente = DB::table($table)
												->where($ordenField, $numero)
												->where($trabajadoField, 'PENDIENTE')
												->exists();

											if ($existente) {
												break;
											}
										}
									}
									
									$existentes[$table][] = $existente;
								}
							}
						}
					}

					$existePendiente = false;
					foreach ($existentes as $table => $records) {
						if (in_array(true, $records)) {
							$existePendiente = true;
							break;
						}
					}

					if ($existePendiente) {
						$message = '¡ERROR!';
						$messages = 'BOLETA YA REGISTRADA PENDIENTE';
						return view('llamadashome/instalaciones', compact('message', 'messages'))
							->with('page_title', 'Instalaciones - Registro')
							->with('navigation', 'Instalaciones');
					}
					
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataGponAnulacion= new InstalacionGponAnulada($data);

					// Guardamos la instancia en la base de datos
					$dataGponAnulacion->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO GPON ANULACION COMPLETADO";
					return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
					'tecnologia',
					'tipo_actividadCobre',
					'OrdenLineaCobre',
					'NumeroCobre',
					'GeoreferenciaCobre',
					'sap_cobre',
					'TrabajadoCobre',
					'ObservacionesCobre',
					'RecibeCobre',
					'MaterialesCobre',
					'username_creacion',
					'username_atencion',
					'codigoUnico',
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

				$numeroOrden = $data['OrdenLineaCobre']; 
					
				$trabajadoFields = Tableconfig::getTrabajadoFields();
				$tables = Tableconfig::getTables();

				foreach ($tables as $table => $ordenField) {
					if (array_key_exists($table, $trabajadoFields)) {
						$trabajadoField = $trabajadoFields[$table];
						$trabajadoRecord = DB::table($table)
							->where($ordenField, $numeroOrden)
							->where($trabajadoField, 'PENDIENTE')
							->exists();

						if ($trabajadoRecord) {
							$message = '¡ERROR!';
							$messages = 'BOLETA YA REGISTRADA PENDIENTE';
							return view('llamadashome/instalaciones', compact('message', 'messages'))
								->with('page_title', 'Instalaciones - Registro')
								->with('navigation', 'Instalaciones');
						}
					}
				}
			 
				// Generamos un código único de 8 caracteres
				$data['codigoUnico'] = mt_rand(10000000, 99999999);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;

				
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
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadCobre',
						'MotivoObjetada_Cobre',
						'OrdenCobre_Objetada',
						'TrabajadoCobre_Objetado',
						'ComentariosCobre_Objetados',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['OrdenCobre_Objetada']; 
					
   					$trabajadoFields = Tableconfig::getTrabajadoFields();
    				$tables = Tableconfig::getTables();

					foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCobreObjetada = new InstalacionCobreObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataCobreObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO COBRE OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadCobre',
						'MotivoAnulada_Cobre',
						'OrdenAnuladaCobre',
						'TrabajadoAnulada_Cobre',
						'ComentarioAnulada_Cobre',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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
					// dd($data);

					$numeroOrden = $data['OrdenAnuladaCobre']; 
					
   					$trabajadoFields = Tableconfig::getTrabajadoFields();
    				$tables = Tableconfig::getTables();

					foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);


					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataCobreAnulada = new InstalacionCobreAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataCobreAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO COBRE ANULACION COMPLETADO";
					
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
					'tecnologia',
					'tipo_actividadDth',
					'ordenTv_Dth',
					'SyrengDth',
					'GeoreferenciaDth',
					'sap_dth',
					'TrabajadoDthRealizado',
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
					'MaterialesDth',
					'username_creacion',
					'username_atencion',
                ];

                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoDthRealizado' && $request->has('TrabajadoDthRealizado')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoDthRealizado') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				// dd($data);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;

				$numeroOrden = $data['ordenTv_Dth']; 
					
   				$trabajadoFields = Tableconfig::getTrabajadoFields();
    			$tables = Tableconfig::getTables();

				foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
				}
					
					// Generamos un código único de 8 caracteres
				$data['codigoUnico'] = mt_rand(10000000, 99999999);

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
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadDth',
						'MotivoObjetada_Dth',
						'TrabajadoObj_Dth',
						'OrdenObj_Dth',
						'ComentarioObjetado_Dth',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['OrdenObj_Dth']; 
					
   					$trabajadoFields = Tableconfig::getTrabajadoFields();
    				$tables = Tableconfig::getTables();

					foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
					}

					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataDthObjetada = new InstalacionDthObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataDthObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO DTH OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadDth',
						'MotivoAnulada_Dth',
						'OrdenAnulada_Dth',
						'TrabajadoAnulada_Dth',
						'ComentarioAnulada_Dth',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['OrdenAnulada_Dth'];
					$trabajadoFields = Tableconfig::getTrabajadoFields();
    				$tables = Tableconfig::getTables();

					foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
					}


					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataDthAnulada = new InstalacionDthAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataDthAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO DTH ANULACION COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
                        ->with('page_title', 'Instalaciones - Registro')
                        ->with('navigation', 'Instalaciones');
						
					
                }elseif ($data['tipo_actividadDth'] == 'REFRESH') {
					
					$selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadDth',
						'NordenRefresh',
						'refreshSelectDth',
						'ComentarioRefresh_Dth',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
					];
	
					$data = [];
	
					$data = $request->only($selectedFields);
					
					// dd($data);

					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);
					
					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataDthRefresh= new InstalacionesDthRefresh($data);

                    // Guardamos la instancia en la base de datos
                    $dataDthRefresh->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO REFRESH COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
					'tecnologia',
                    'tipo_actividadAdsl',
                    'orden_internet_adsl',
                    'Georeferencia_Adsl',
                    'TrabajadoAdsl',
                    'Obvservaciones_Adsl',
                    'Recibe_Adsl',
                    'Materiales_Adsl',
					'username_creacion',
					'username_atencion',
					'codigoUnico',
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

				$numeroOrden = $data['orden_internet_adsl']; 
					
   				$trabajadoFields = Tableconfig::getTrabajadoFields();
    			$tables = Tableconfig::getTables();

				foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
				}
					
					// Generamos un código único de 8 caracteres
				$data['codigoUnico'] = mt_rand(10000000, 99999999);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;

				
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
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadAdsl',
						'MotivoObjetada_Adsl',
						'OrdenAdsl_Objetada',
						'TrabajadoAdslObjetado',
						'ComentariosObjetada_Adsl',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['OrdenAdsl_Objetada']; 
					
   					$trabajadoFields = Tableconfig::getTrabajadoFields();
    				$tables = Tableconfig::getTables();

					foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdslObjetada = new InstalacionAdslObjetada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdslObjetada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO ADSL OBJETADO COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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
						'tecnologia',
						'tipo_actividadAdsl',
						'MotivoAnulada_Adsl',
						'OrdenAnuladaAdsl',
						'TrabajadoAnulada_Adsl',
						'ComentarioAnulada_Adsl',
						'username_creacion',
						'username_atencion',
						'codigoUnico',
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

					$numeroOrden = $data['OrdenAnuladaAdsl']; 
					
   					$trabajadoFields = Tableconfig::getTrabajadoFields();
    				$tables = Tableconfig::getTables();

					foreach ($tables as $table => $ordenField) {
						if (array_key_exists($table, $trabajadoFields)) {
							$trabajadoField = $trabajadoFields[$table];
							$trabajadoRecord = DB::table($table)
								->where($ordenField, $numeroOrden)
								->where($trabajadoField, 'PENDIENTE')
								->exists();

							if ($trabajadoRecord) {
								$message = '¡ERROR!';
								$messages = 'BOLETA YA REGISTRADA PENDIENTE';
								return view('llamadashome/instalaciones', compact('message', 'messages'))
									->with('page_title', 'Instalaciones - Registro')
									->with('navigation', 'Instalaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataAdslAnulada = new InstalacionAdslAnulada($data);

                    // Guardamos la instancia en la base de datos
                    $dataAdslAnulada->save();

					$message = "¡EXITO!";
					$messages = "REGISTRO ADSL ANULACION COMPLETADO";
                    return view('llamadashome/instalaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
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

   