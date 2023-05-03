<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;

use SSD\Models\Instalaciones\InstalacionHfcRealizada;
use SSD\Models\Instalaciones\InstalacionHfcObjetada;
use SSD\Models\Instalaciones\InstalacionHfcTransferida;
use SSD\Models\Instalaciones\InstalacionHfcAnulada;


use SSD\Models\Instalaciones\InstalacionGponAnulada;
use SSD\Models\Instalaciones\InstalacionGponTransferida;
use SSD\Models\Instalaciones\InstalacionGponObjetada;
use SSD\Models\Instalaciones\InstalacionGponRealizada;


use SSD\Models\Instalaciones\InstalacionDthRealizada;
use SSD\Models\Instalaciones\InstalacionDthObjetada;
use SSD\Models\Instalaciones\InstalacionDthAnulada;



use SSD\Models\Instalaciones\InstalacionCobreRealizada;
use SSD\Models\Instalaciones\InstalacionCobreObjetada;
use SSD\Models\Instalaciones\InstalacionCobreAnulada;

use SSD\Models\Instalaciones\InstalacionAdslRealizada;
use SSD\Models\Instalaciones\InstalacionAdslObjetada;
use SSD\Models\Instalaciones\InstalacionAdslAnulada;

class ActualizarDatos extends Controller
{
    //


    public function editar(Request $request) {

        $id = $request->input('id');
        $motivo_llamada = $request->input('motivo_llamada');
        $NumeroOrden = $request->input('NumeroOrden');
        $actividad_tipo = $request->input('actividad_tipo');
        $tecnologia = $request->input('tecnologia');
        
        // Buscar el registro en las tres tablas
        $registro_tabla_1 = InstalacionHfcRealizada::where(function($query) use ($NumeroOrden) {
            $query->where('orden_tv_hfc', $NumeroOrden)
                  ->orWhere('orden_internet_hfc', $NumeroOrden)
                  ->orWhere('orden_linea_hfc', $NumeroOrden);
        })
            ->where('id', $id)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();
    
        $registro_tabla_2 = InstalacionHfcObjetada::where(function($query) use ($NumeroOrden) {
            $query->where('orden_tv_hfc', $NumeroOrden)
                  ->orWhere('orden_internet_hfc', $NumeroOrden)
                  ->orWhere('orden_linea_hfc', $NumeroOrden);
        })
            ->where('id', $id)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();
        
        $registro_tabla_3 = InstalacionHfcAnulada::where(function($query) use ($NumeroOrden) {
            $query->where('orden_tv_hfc', $NumeroOrden)
                  ->orWhere('orden_internet_hfc', $NumeroOrden)
                  ->orWhere('orden_linea_hfc', $NumeroOrden);
        })
            ->where('id', $id)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();


        $registro_tabla_4 = InstalacionHfcTransferida::where(function($query) use ($NumeroOrden) {
                $query->where('orden_tv_hfc', $NumeroOrden)
                      ->orWhere('orden_internet_hfc', $NumeroOrden)
                      ->orWhere('orden_linea_hfc', $NumeroOrden);
            })
                ->where('id', $id)
                ->where('tecnologia', $tecnologia)
                ->where('tipo_actividad', $actividad_tipo)
                ->where('motivo_llamada', $motivo_llamada)
                ->first();

        $registro_tabla_5 = InstalacionGponRealizada::where(function($query) use ($NumeroOrden) {
                $query->where('OrdenTv_Gpon', $NumeroOrden)
                      ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                      ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
            })
                ->where('id', $id)
                ->where('tecnologia', $tecnologia)
                ->where('tipo_actividadGpon', $actividad_tipo)
                ->where('motivo_llamada', $motivo_llamada)
                ->first();  
                
        $registro_tabla_6 = InstalacionGponObjetada::where(function($query) use ($NumeroOrden) {
                $query->where('OrdenTv_Gpon', $NumeroOrden)
                      ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                      ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
            })
                ->where('id', $id)
                ->where('tecnologia', $tecnologia)
                ->where('tipo_actividadGpon', $actividad_tipo)
                ->where('motivo_llamada', $motivo_llamada)
                ->first(); 


        $registro_tabla_7 = InstalacionGponTransferida::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenTv_Gpon', $NumeroOrden)
                        ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                        ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();

        $registro_tabla_8 = InstalacionGponAnulada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenTv_Gpon', $NumeroOrden)
                        ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                        ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_9 = InstalacionDthRealizada::where(function($query) use ($NumeroOrden) {
                    $query->where('ordenTv_Dth', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadDth', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
                    
        $registro_tabla_10 = InstalacionDthObjetada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenObj_Dth', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadDth', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();

        $registro_tabla_11 = InstalacionDthAnulada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenAnulada_Dth', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadDth', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_12 = InstalacionCobreRealizada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenLineaCobre', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadCobre', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_13 = InstalacionCobreObjetada::where(function($query) use ($NumeroOrden) {
                        $query->where('OrdenCobre_Objetada', $NumeroOrden);
                    })
                        ->where('id', $id)
                        ->where('tecnologia', $tecnologia)
                        ->where('tipo_actividadCobre', $actividad_tipo)
                        ->where('motivo_llamada', $motivo_llamada)
                        ->first();
        $registro_tabla_14 = InstalacionCobreAnulada::where(function($query) use ($NumeroOrden) {
                        $query->where('OrdenAnuladaCobre', $NumeroOrden);
                    })
                        ->where('id', $id)
                        ->where('tecnologia', $tecnologia)
                        ->where('tipo_actividadCobre', $actividad_tipo)
                        ->where('motivo_llamada', $motivo_llamada)
                        ->first();
        $registro_tabla_15 = InstalacionAdslRealizada::where(function($query) use ($NumeroOrden) {
                                $query->where('orden_internet_adsl', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('tipo_actividadAdsl', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
        $registro_tabla_16 = InstalacionAdslObjetada::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenAdsl_Objetada', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('tipo_actividadAdsl', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();

        $registro_tabla_17 = InstalacionAdslAnulada::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenAnuladaAdsl', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('tipo_actividadAdsl', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
            // Validar en qué tabla se encontró el registro
            if ($registro_tabla_1) {
                // Si el registro está en la tabla_1, redirigir a la vista de edición de tabla_1

                // dd($registro_tabla_1);
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')	
                ->with('registro', $registro_tabla_1);
            } elseif ($registro_tabla_2) {
                // Si el registro está en la tabla_2, redirigir a la vista de edición de tabla_2
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_2);
            } elseif ($registro_tabla_3) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_3);
            }elseif ($registro_tabla_4) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_4);
            }elseif ($registro_tabla_5) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_5);
            }elseif ($registro_tabla_6) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_6);
            }elseif ($registro_tabla_7) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_7);
            }elseif ($registro_tabla_8) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_8);
            }elseif ($registro_tabla_9) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_9);
            }elseif ($registro_tabla_10) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_10);
            }elseif ($registro_tabla_11) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_11);
            }elseif ($registro_tabla_12) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_12);
            }elseif ($registro_tabla_13) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_13);
            }elseif ($registro_tabla_14) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_14);
            }elseif ($registro_tabla_15) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_15);
            }elseif ($registro_tabla_16) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_16);
            }elseif ($registro_tabla_17) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_17);
            }
               else {
                // Si no se encontró el registro en ninguna de las tablas, redirigir a la vista de resultados
            return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar');
            }
    
        }
    
    public function actualizar(Request $request, $id)
    {
        $tecnologia = $request->input("tecnologia");
        $tipo_actividad = $request->input("tipo_actividad");
        $tipo_actividadGpon = $request->input("tipo_actividadGpon");
        $tipo_actividadDth = $request->input("tipo_actividadDth");
        $tipo_actividadCobre = $request->input("tipo_actividadCobre");
        $tipo_actividadAdsl = $request->input("tipo_actividadAdsl");



        switch($tecnologia){
            case"HFC":

                if($tipo_actividad === "REALIZADA"){
                    // Campos seleccionados del formulario
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
                        'MaterialesHfc'
                    ];

                    $registro = InstalacionHfcRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoHfc' && $request->has('TrabajadoHfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoHfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividad === "OBJETADA"){

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
					];
                    
                    $registro = InstalacionHfcObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoObjetadaHfc' && $request->has('TrabajadoObjetadaHfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoObjetadaHfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividad === "ANULACION"){

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

					];
                    $registro = InstalacionHfcAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Hfc' && $request->has('TrabajadoAnulada_Hfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Hfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividad === "TRANSFERIDA"){

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

					];
                    $registro = InstalacionHfcTransferida::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoTransferido_Hfc' && $request->has('TrabajadoTransferido_Hfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoTransferido_Hfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC TRANSFERIDO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                } 
             break;
            case"GPON":

                if($tipo_actividadGpon === "REALIZADA"){
                    // Campos seleccionados del formulario
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
                    ];

                    $registro = InstalacionGponRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoGpon' && $request->has('TrabajadoGpon')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoGpon') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadGpon === "OBJETADA"){

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
                    
                    $registro = InstalacionGponObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoGpon_Objetado' && $request->has('TrabajadoGpon_Objetado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoGpon_Objetado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadGpon === "ANULACION"){

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

					];
                    $registro = InstalacionGponAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Gpon' && $request->has('TrabajadoAnulada_Gpon')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Gpon') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadGpon === "TRANSFERIDA"){

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
                    $registro = InstalacionGponTransferida::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoTransferido_Gpon' && $request->has('TrabajadoTransferido_Gpon')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoTransferido_Gpon') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON TRANSFERIDO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                } 
             break;
            case"DTH":

                if($tipo_actividadDth === "REALIZADA"){
                    // Campos seleccionados del formulario
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
                        'MaterialesDth',
                        'username_creacion',
                        'username_atencion',
                    ];

                    $registro = InstalacionDthRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoDth' && $request->has('TrabajadoDth')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoDth') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO DTH ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadDth === "OBJETADA"){

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
					];
                    
                    $registro = InstalacionDthObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoObj_Dth' && $request->has('TrabajadoObj_Dth')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoObj_Dth') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO DTH OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadDth === "ANULACION"){

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
					];
                    $registro = InstalacionDthAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Dth' && $request->has('TrabajadoAnulada_Dth')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Dth') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO DTH ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }
             break;
             case"COBRE":

                if($tipo_actividadCobre === "REALIZADA"){
                    // Campos seleccionados del formulario
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
                    ];
    
                    $registro = InstalacionCobreRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoCobre' && $request->has('TrabajadoCobre')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoCobre') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadCobre === "OBJETADA"){

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
					];
                    
                    $registro = InstalacionCobreObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoCobre_Objetado' && $request->has('TrabajadoCobre_Objetado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoCobre_Objetado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadCobre === "ANULACION"){

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
					];
                    $registro = InstalacionCobreAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Cobre' && $request->has('TrabajadoAnulada_Cobre')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Cobre') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }
             break;

             case"ADSL":

                if($tipo_actividadAdsl === "REALIZADA"){
                    // Campos seleccionados del formulario
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
                    ];
    
                    $registro = InstalacionAdslRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAdsl' && $request->has('TrabajadoAdsl')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAdsl') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO ADSL ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadAdsl === "OBJETADA"){

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
					];
                    
                    $registro = InstalacionAdslObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAdslObjetado' && $request->has('TrabajadoAdslObjetado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAdslObjetado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadAdsl === "ANULACION"){

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
					];

                    $registro = InstalacionAdslAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Adsl' && $request->has('TrabajadoAnulada_Adsl')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Adsl') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO ADSL ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }
             break;
            default:
            break;
            } 
                
           
        
    }

}