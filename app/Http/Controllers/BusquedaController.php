<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use SSD\Models\Instalaciones\InstalacionGponAnulada;
use SSD\Models\Instalaciones\InstalacionGponTransferida;
use SSD\Models\Instalaciones\InstalacionGponObjetada;
use SSD\Models\Instalaciones\InstalacionGponRealizada;


use SSD\Models\Instalaciones\InstalacionHfcRealizada;
use SSD\Models\Instalaciones\InstalacionHfcObjetada;
use SSD\Models\Instalaciones\InstalacionHfcTransferida;
use SSD\Models\Instalaciones\InstalacionHfcAnulada;
use Illuminate\Support\Facades\DB;
use SSD\User;



class BusquedaController extends Controller
{
    public function showBusquedas()
	{		
		$breadcrumb = [
				['name' => 'Busqueda - Saturado' ]
		];		

		$resultados = [];
        $NumeroOrden = null;
		
		return view('llamadashome/busqueda', [
			'resultados' => $resultados,
			'NumeroOrden' => $NumeroOrden,

		])
		->with('page_title', 'Busqueda - Registros')
		->with('navigation', 'Busqueda - Registros');	
	}

	public function usersAll()
    {
        $users = User::pluck('first_name');

        // dd($users);

        return view('llamadashome/busqueda', [
            'users' => $users
        ])
		->with('page_title', 'Busqueda - Registros')
		->with('navigation', 'Busqueda - Registros');
    }


	

	public function generarBusqueda(Request $request)
	{

		$NumeroOrden = $request->input('NordenBusqueda');
		$resultados = [];

	
		if (!empty($NumeroOrden)) {
			$columnas = [
				'instalacionhfc_realizada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'] ,
				'instalacionhfc_objetada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
				'instalacionhfc_anulada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
				'instalacionhfc_transferida' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
				'instalaciongpon_anulada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciongpon_objetada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciongpon_realizada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciongpon_transferida' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
			];
			$status = [
				'instalacionhfc_realizada' => ['TrabajadoHfc'] ,
				'instalacionhfc_objetada' => ['TrabajadoObjetadaHfc'],
				'instalacionhfc_anulada' => ['TrabajadoAnulada_Hfc'],
				'instalacionhfc_transferida' => ['TrabajadoTransferido_Hfc'],
				'instalaciongpon_anulada' => ['TrabajadoAnulada_Gpon'],
				'instalaciongpon_objetada' => ['TrabajadoGpon_Objetado'],
				'instalaciongpon_realizada' => ['TrabajadoGpon'],
				'instalaciongpon_transferida' => ['TrabajadoTransferido_Gpon'],
			];

			$tipo_actividad_properties = [
				'instalacionhfc_realizada' => ['tipo_actividad'] ,
				'instalacionhfc_objetada' => ['tipo_actividad'],
				'instalacionhfc_anulada' => ['tipo_actividad'],
				'instalacionhfc_transferida' => ['tipo_actividad'],
				'instalaciongpon_anulada' => ['tipo_actividadGpon'],
				'instalaciongpon_objetada' => ['tipo_actividadGpon'],
				'instalaciongpon_realizada' => ['tipo_actividadGpon'],
				'instalaciongpon_transferida' => ['tipo_actividadGpon'],
			];
			
			$resultados = [];
			
			
			foreach ($columnas as $tabla => $columnas_tabla) {
				foreach ($columnas_tabla as $columna) {
					$resultados_tabla = DB::table($tabla)
						->where($columna, '=', $NumeroOrden)
						->orderBy('updated_at', 'desc')
						->get();
	
					$resultados = array_merge($resultados, $resultados_tabla);
				}
			}
	
			foreach ($resultados as $resultado) {
				foreach ($status as $clave => $valores) {
					foreach ($valores as $valor) {
						if (property_exists($resultado, $valor)) {
							$resultado->estatus = $resultado->{$valor};
							$propiedad_actividad_tipo = $tipo_actividad_properties[$clave][0];
							$resultado->actividad_tipo = $resultado->{$propiedad_actividad_tipo};
							break;
						}
					}
				}
			}
			
			foreach ($resultados as $resultado) {
				foreach ($status as $clave => $valores) {
					foreach ($valores as $valor) {
						if (property_exists($resultado, $valor)) {
							$resultado->estatus = $resultado->{$valor};
							break;
						}
					}
				}
				
				$resultado->NumeroOrden = $NumeroOrden; 
			}

			
			
		} else {
			$resultados = [];
		}
		

		// dd($resultados);
	
		return view('llamadashome/busqueda', [
			'resultados' => $resultados,
			'NumeroOrden' => $NumeroOrden,

		])
		->with('page_title', 'Busqueda - Registros')
		->with('navigation', 'Busqueda - Registros');			
	}
	
}