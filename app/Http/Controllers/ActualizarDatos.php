<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;

use SSD\Models\Instalaciones\InstalacionHfcRealizada;

use SSD\Models\Instalaciones\InstalacionHfcObjetada;

use SSD\Models\Instalaciones\InstalacionHfcTransferida;

use SSD\Models\Instalaciones\InstalacionHfcAnulada;

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
            } else {
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
            } 
                
            break;
        
    }

    // Otras funciones del controlador...

    
    
}