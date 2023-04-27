<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;




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
        $registro_tabla_1 = InstalacionHfcRealizada::where('orden_tv_hfc', $NumeroOrden)
        ->orWhere('orden_internet_hfc', $NumeroOrden)
        ->orWhere('orden_linea_hfc', $NumeroOrden)
        ->where('tecnologia', $tecnologia)
        ->where('tipo_actividad', $actividad_tipo)
        ->where('motivo_llamada', $motivo_llamada)
        ->first();
    
        $registro_tabla_2 = InstalacionHfcObjetada::where('orden_tv_hfc', $NumeroOrden)
            ->orWhere('orden_internet_hfc', $NumeroOrden)
            ->orWhere('orden_linea_hfc', $NumeroOrden)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();
        
        $registro_tabla_3 = InstalacionHfcAnulada::where('orden_tv_hfc', $NumeroOrden)
            ->orWhere('orden_internet_hfc', $NumeroOrden)
            ->orWhere('orden_linea_hfc', $NumeroOrden)
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
            } else {
                // Si no se encontró el registro en ninguna de las tablas, redirigir a la vista de resultados
            return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar');
            }
    }
    
    // public function editar($id) {
    //     // Buscar el registro en las tres tablas
    //     $registro_tabla_1 = InstalacionHfcRealizada::where('id', $id)->where('orden_tv_hfc', $id)->first();
    //     $registro_tabla_2 = InstalacionHfcObjetada::where('id', $id)->where('orden_tv_hfc', $id)->first();
    //     $registro_tabla_3 = InstalacionHfcAnulada::where('id', $id)->where('orden_tv_hfc', $id)->first();
    
    //     // Validar en qué tabla se encontró el registro
    //     if ($registro_tabla_1) {
    //         // Si el registro está en la tabla_1, redirigir a la vista de edición de tabla_1
    //         return view('llamadashome/editarinstalaciones')
    //             ->with('page_title', 'Instalaciones - Actualizar')
    //             ->with('navigation', 'Instalaciones')
    //             ->with('registro', $registro_tabla_1);
    //     } elseif ($registro_tabla_2) {
    //         // Si el registro está en la tabla_2, redirigir a la vista de edición de tabla_2
    //         return view('llamadashome/editarinstalaciones')
    //             ->with('page_title', 'Instalaciones - Actualizar')
    //             ->with('navigation', 'Instalaciones')
    //             ->with('registro', $registro_tabla_2);
    //     } elseif ($registro_tabla_3) {
    //         // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
    //         return view('llamadashome/editarinstalaciones')
    //             ->with('page_title', 'Instalaciones - Actualizar')
    //             ->with('navigation', 'Instalaciones')
    //             ->with('registro', $registro_tabla_3);
    //     } else {
    //         // Si no se encontró el registro en ninguna de las tablas, redirigir a la vista de resultados
    //         return view('llamadashome/editarinstalaciones')
    //             ->with('page_title', 'Instalaciones - Actualizar')
    //             ->with('navigation', 'Instalaciones');
    //     }
    // }
    
    
}