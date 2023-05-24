<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;


use SSD\Models\Reparaciones\repacionesDth_Realizado;

use SSD\Models\Reparaciones\repacionesDth_Objetado;

use SSD\Models\Reparaciones\repacionesDth_Transferido;

use SSD\Models\Reparaciones\repacionesCobre_Realizado;

use SSD\Models\Reparaciones\repacionesCobre_Objetado;

use SSD\Models\Reparaciones\repacionesCobre_Transferido;

use SSD\Models\Reparaciones\repacionesAdsl_Realizado;

use SSD\Models\Reparaciones\repacionesAdsl_Objetado;

use SSD\Models\Reparaciones\repacionesAdsl_Transferido;

use SSD\Models\Reparaciones\repacionesGpon_Realizado;

use SSD\Models\Reparaciones\reparacionesGpon_Objetado;

use SSD\Models\Reparaciones\reparacionesGpon_Transferido;

use SSD\Models\Reparaciones\reparacionesHfc_Realizado;

use SSD\Models\Reparaciones\reparacionesHfc_Objetado;

use SSD\Models\Reparaciones\reparacionesHfc_Transferido;

use SSD\Tableconfig;

use Illuminate\Support\Facades\DB;


class ReparacionesController extends Controller
{
    
    public function store(Request $request)
    {
        $tecnologia = $request->input('tecnologia');
		$select_orden = $request->input("select_orden");



        // Evaluamos la tecnología seleccionada
        switch ($tecnologia) {
			case 'HFC':
				$selectedFields = [
					'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'tecnologia',
                    'select_orden',
                    'dpto_colonia',
                    'TipoActividadReparacionHfc',
                    'CodigoCausaHfc',
                    'DescripcionCausaDañoHfc',
                    'DescripcionTipoDañoHfc',
                    'DescripcionUbicacionHfc',
                    'OrdenHfc',
                    'syrengHfc',
                    'ObservacionesHfc',
                    'RecibeHfc',
                    'TrabajadoHfcRealizado',
                    'username_creacion',
                    'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoHfcRealizado' && $request->has('TrabajadoHfcRealizado')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoHfcRealizado') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadReparacionHfc'] == 'REALIZADA') {

					// dd($data);
					$numeroOrden = $data['OrdenHfc']; 
								
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataReparacionHfcRealizada = new reparacionesHfc_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataReparacionHfcRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

						
                }elseif($data['TipoActividadReparacionHfc'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionHfc',
                        'MotivoObjetada_Hfc',
                        'OrdenObjHfc',
                        'TrabajadoReparacionesObjetadaHfc',
                        'ComentariosObjetados_Hfc',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoReparacionesObjetadaHfc' && $request->has('TrabajadoReparacionesObjetadaHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoReparacionesObjetadaHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenObjHfc']; 
							
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					 // Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesHfcObj = new reparacionesHfc_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataReparacionesHfcObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'Reparaciones');

				
				}elseif($data['TipoActividadReparacionHfc'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionHfc',
                        'OrdenTransfHfc',
                        'ObvsTransfHfc',
                        'ComentarioTransfHfc',
                        'TrabajadoTransfHfc',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransfHfc' && $request->has('TrabajadoTransfHfc')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransfHfc') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenTransfHfc']; 
							
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					 // Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesHfcTransferida = new reparacionesHfc_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataReparacionesHfcTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

				}
                break;
            case 'GPON':
				$selectedFields = [
					'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'tecnologia',
                    'select_orden',
                    'dpto_colonia',
                    'TipoActividadReparacionGpon',
                    'CodigoCausaGpon',
                    'DescripcionCausaDañoGpon',
                    'DescripcionTipoDañoGpon',
                    'DescripcionUbicacionGpon',
                    'OrdenRealizadoGpon',
                    'syrengGpon',
                    'ObservacionesGpon',
                    'RecibeGpon',
                    'TrabajadoReparacionesGpon',
                    'username_creacion',
                    'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoReparacionesGpon' && $request->has('TrabajadoReparacionesGpon')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoReparacionesGpon') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}
				
				// dd($data);

                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadReparacionGpon'] == 'REALIZADA') {
					
					$numeroOrden = $data['OrdenRealizadoGpon']; 
							
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataReparacionGponRealizada = new repacionesGpon_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataReparacionGponRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');
						
                }elseif($data['TipoActividadReparacionGpon'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionGpon',
                        'MotivoObjetada_Gpon',
                        'OrdenObjGpon',
                        'TrabajadoObjetadaGpon',
                        'ComentariosObjGpon',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjetadaGpon' && $request->has('TrabajadoObjetadaGpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjetadaGpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenObjGpon']; 
							
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					 // Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesGponObj = new reparacionesGpon_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataReparacionesGponObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'Reparaciones');

				
				}elseif($data['TipoActividadReparacionGpon'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionGpon',
                        'OrdenTransGpon',
                        'ObvsTransfGpon',
                        'ComentarioTransfGpon',
                        'TrabajadoTransfGpon',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransfGpon' && $request->has('TrabajadoTransfGpon')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransfGpon') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenTransGpon']; 
							
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					 // Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);


					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesGponTransferida = new reparacionesGpon_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataReparacionesGponTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');
				}
                break;
            case 'ADSL':
				$selectedFields = [
					'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'tecnologia',
                    'select_orden',
                    'dpto_colonia',
                    'TipoActividadReparacionAdsl',
                    'CodigoCausaAdsl',
                    'DescripcionCausaAdsl',
                    'DescripcionTipoDañoAdsl',
                    'DescripcionUbicacionDañoAdsl',
                    'OrdenAdslRealizado',
                    'syrengAdsl',
                    'ObservacionesAdsl',
                    'RecibeAdsl',
                    'TrabajadoReparacionAdsl',
                    'username_creacion',
                    'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoReparacionAdsl' && $request->has('TrabajadoReparacionAdsl')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoReparacionAdsl') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}

                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadReparacionAdsl'] == 'REALIZADA') {

							// dd($data);
					$numeroOrden = $data['OrdenAdslRealizado'];
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataReparacionAdslRealizada = new repacionesAdsl_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataReparacionAdslRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

						
                }elseif($data['TipoActividadReparacionAdsl'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionAdsl',
                        'MotivoObjetada_Adsl',
                        'OrdenObjAdsl',
                        'TrabajadoObjetadaAdsl',
                        'ComentsObjAdsl',
                        'username_creacion',
                        'username_atencion'
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjetadaAdsl' && $request->has('TrabajadoObjetadaAdsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjetadaAdsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenObjAdsl'];
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					$data['codigoUnico'] = mt_rand(10000000, 99999999);
					
					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesAdslObj = new repacionesAdsl_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataReparacionesAdslObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'Reparaciones');

				
				}elseif($data['TipoActividadReparacionAdsl'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionAdsl',
                        'OrdenTransferidoAdsl',
                        'ObvsAdslTransferido',
                        'TrabajadoTransferidoAdsl',
                        'ComentsTransferidoAdsl',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransferidoAdsl' && $request->has('TrabajadoTransferidoAdsl')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransferidoAdsl') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenTransferidoAdsl'];
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}
					
					$data['codigoUnico'] = mt_rand(10000000, 99999999);
					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesAdslTransferida = new repacionesAdsl_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataReparacionesAdslTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

				}
            case 'COBRE':
				$selectedFields = [
					'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'tecnologia',
                    'select_orden',
                    'dpto_colonia',
                    'TipoActividadReparacionCobre',
                    'CodigoCausaCobre',
                    'DescripcionCausaCobre',
                    'DescripcionTipoDañoCobre',
                    'DescripcionUbicacionDañoCobre',
                    'OrdenReparacionCobre',
                    'syrengReparacionCobre',
                    'ObservacionesCobre',
                    'RecibeCobre',
                    'TrabajadoReparacionCobre',
                    'username_creacion',
                    'username_atencion',
				];
		
                $data = [];

                // Iteramos por los campos seleccionados del formulario
				foreach ($selectedFields as $fieldName) {
					$value = $request->input($fieldName);
					if ($fieldName === 'TrabajadoReparacionCobre' && $request->has('TrabajadoReparacionCobre')) {
						$data[$fieldName] = 'TRABAJADO';
					} elseif ($fieldName === 'TrabajadoReparacionCobre') {
						$data[$fieldName] = 'PENDIENTE';
					} else {
						$data[$fieldName] = $value;
					}
				}

				// dd($data);

                // Evaluamos si la tecnología ADSL fue realizada u objetada
                if ($data['TipoActividadReparacionCobre'] == 'REALIZADA') {

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$numeroOrden = $data['OrdenReparacionCobre']; 
						
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataReparacionCobreRealizada = new repacionesCobre_Realizado($data);
					

                    // // Guardamos la instancia en la base de datos
                    $dataReparacionCobreRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

						
                }elseif($data['TipoActividadReparacionCobre'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionCobre',
                        'MotivoObjetada_Cobre',
                        'OrdenObjReparacionCobre',
                        'TrabajadoObjetadaCobre',
                        'ComentariosObjetados_Cobre',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjetadaCobre' && $request->has('TrabajadoObjetadaCobre')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjetadaCobre') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenObjReparacionCobre']; 
						
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesCobreObj = new repacionesCobre_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataReparacionesCobreObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'Reparaciones');

				
				}elseif($data['TipoActividadReparacionCobre'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionCobre',
                        'OrdenTransfCobre',
                        'ObvsCobreTransferido',
                        'ComentarioCobreTransferido',
                        'TrabajadoCobreTransferido',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoCobreTransferido' && $request->has('TrabajadoCobreTransferido')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoCobreTransferido') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenTransfCobre']; 
						
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);



					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesCobreTransferida = new repacionesCobre_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataReparacionesCobreTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

				}
                break;    
            case 'DTH':
				$selectedFields = [
					'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'tecnologia',
                    'select_orden',
                    'dpto_colonia',
                    'TipoActividadReparacionDth',
                    'CodigoCausaDth',
                    'DescripcionCausaDth',
                    'DescripcionTipoDañoDth',
                    'DescripcionUbicacionDañoDth',
                    'OrdenDthRealizada',
                    'syrengDthRealizado',
                    'ObservacionesDth',
                    'RecibeDth',
                    'TrabajadoDth',
                    'username_creacion',
                    'username_atencion',
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
                if ($data['TipoActividadReparacionDth'] == 'REALIZADA') {

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$numeroOrden = $data['OrdenDthRealizada']; 
						
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}
					
					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);
                    // Incluimos los datos adicionales para la tecnología ADSL realizada
                    $dataReparacionDthRealizada = new repacionesDth_Realizado($data);

                    // // Guardamos la instancia en la base de datos
                    $dataReparacionDthRealizada->save();

					
					$message = "¡EXITO!";
					$messages = "REGISTRO REALIZADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'Reparaciones');
                }elseif($data['TipoActividadReparacionDth'] == 'OBJETADA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionDth',
                        'MotivoObjetada_Dth',
                        'OrdenObjDth',
                        'TrabajadoObjetadaDth',
                        'ComentariosObjetadosDth',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoObjetadaDth' && $request->has('TrabajadoObjetadaDth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoObjetadaDth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					

					$numeroOrden = $data['OrdenObjDth']; 
					
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}

					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);


					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesDthObj = new repacionesDth_Objetado($data);

					// Guardamos la instancia en la base de datos
					$dataReparacionesDthObj->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO OBJETADO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'Reparaciones');

				
				}elseif($data['TipoActividadReparacionDth'] == 'TRANSFERIDA'){
					$selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionDth',
                        'OrdenTransferidoDth',
                        'ObvsTransferidoDth',
                        'ComentarioTransferidoDth',
                        'TrabajadoTransferidoDth',
                        'username_creacion',
                        'username_atencion',
					];

					$data = [];

					// Iteramos por los campos seleccionados del formulario
					foreach ($selectedFields as $fieldName) {
						$value = $request->input($fieldName);
						if ($fieldName === 'TrabajadoTransferidoDth' && $request->has('TrabajadoTransferidoDth')) {
							$data[$fieldName] = 'TRABAJADO';
						} elseif ($fieldName === 'TrabajadoTransferidoDth') {
							$data[$fieldName] = 'PENDIENTE';
						} else {
							$data[$fieldName] = $value;
						}
					}

					$numeroOrden = $data['OrdenTransferidoDth']; 
					
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
								return view('llamadashome/reparaciones', compact('message', 'messages'))
									->with('page_title', 'Reparaciones - Registro')
									->with('navigation', 'Reparaciones');
							}
						}
					}


					// Generamos un código único de 8 caracteres
					$data['codigoUnico'] = mt_rand(10000000, 99999999);

					// Agregamos el usuario actual como creador y atendedor del registro
					$data['username_creacion'] = Auth::user()->username;
					$data['username_atencion'] = Auth::user()->username;

					$dataReparacionesDthTransferida = new repacionesDth_Transferido($data);

                    // Guardamos la instancia en la base de datos
                    $dataReparacionesDthTransferida->save();


					$message = "¡EXITO!";
					$messages = "REGISTRO TRANSFERIDO COMPLETO";
					return view('llamadashome/reparaciones')
						->with('message', $message)
						->with('messages', $messages)
						->with('codigoUnico', $data['codigoUnico'])
						->with('page_title', 'Reparaciones - Registro')
						->with('navigation', 'reparaciones');

				}
                break;    
			default:
            break;
        }

        // Redireccionamos a la página de inicio
        return redirect('/');
    }
}