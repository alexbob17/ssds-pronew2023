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


use SSD\Models\Instalaciones\InstalacionDthRealizada;
use SSD\Models\Instalaciones\InstalacionDthObjetada;
use SSD\Models\Instalaciones\InstalacionDthAnulada;

use SSD\Models\Instalaciones\InstalacionCobreRealizada;
use SSD\Models\Instalaciones\InstalacionCobreObjetada;
use SSD\Models\Instalaciones\InstalacionCobreAnulada;

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

				// INSTALACIONES
				'instalacionhfc_realizada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'] ,
				'instalacionhfc_objetada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
				'instalacionhfc_anulada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
				'instalacionhfc_transferida' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
				'instalaciongpon_anulada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciongpon_objetada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciongpon_realizada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciongpon_transferida' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
				'instalaciondth_realizada' => ['ordenTv_Dth'],
				'instalaciondth_objetada' => ['OrdenObj_Dth'],
				'instalaciondth_anulada' => ['OrdenAnulada_Dth'],
				'instalacioncobre_realizada' => ['OrdenLineaCobre'],
				'instalacioncobre_objetado' => ['OrdenCobre_Objetada'],
				'instalacioncobre_anulada' => ['OrdenAnuladaCobre'],
				'instalacionadsl_realizada' => ['orden_internet_adsl'],
				'instalacionadsl_objetada' => ['OrdenAdsl_Objetada'],
				'instalacionadsl_anulada' => ['OrdenAnuladaAdsl'],

				// REPARACIONES
				'reparacioneshfc_realizado' => ['OrdenHfc'],
				'reparacioneshfc_objetado' => ['OrdenObjHfc'],
				'reparacioneshfc_transferido' => ['OrdenTransfHfc'],

				'reparacionesgpon_realizado' => ['OrdenRealizadoGpon'],
				'reparacionesgpon_objetado' => ['OrdenObjGpon'],
				'reparacionesgpon_transferido' => ['OrdenTransGpon'],

				'reparacionesdth_realizado' => ['OrdenDthRealizada'],
				'reparacionesdth_objetado' => ['OrdenObjDth'],
				'reparacionesdth_transferido' => ['OrdenTransferidoDth'],

				'reparacionescobre_realizado' => ['OrdenReparacionCobre'],
				'reparacionescobre_objetado' => ['OrdenObjReparacionCobre'],
				'reparacionescobre_transferido' => ['OrdenTransfCobre'],

			];
			$status = [

				// INSTALACIONES
				'instalacionhfc_realizada' => ['TrabajadoHfc'] ,
				'instalacionhfc_objetada' => ['TrabajadoObjetadaHfc'],
				'instalacionhfc_anulada' => ['TrabajadoAnulada_Hfc'],
				'instalacionhfc_transferida' => ['TrabajadoTransferido_Hfc'],
				'instalaciongpon_anulada' => ['TrabajadoAnulada_Gpon'],
				'instalaciongpon_objetada' => ['TrabajadoGpon_Objetado'],
				'instalaciongpon_realizada' => ['TrabajadoGpon'],
				'instalaciongpon_transferida' => ['TrabajadoTransferido_Gpon'],
				'instalaciondth_anulada' => ['TrabajadoAnulada_Dth'],
				'instalacioncobre_realizada' => ['TrabajadoCobre'],
				'instalacioncobre_objetado' => ['TrabajadoCobre_Objetado'],
				'instalacioncobre_anulada' => ['TrabajadoAnulada_Cobre'],
				'instalacionadsl_realizada' => ['TrabajadoAdsl'],
				'instalacionadsl_objetada' => ['TrabajadoAdslObjetado'],
				'instalacionadsl_anulada' => ['TrabajadoAnulada_Adsl'],

				// REPARACIONES
				'reparacioneshfc_realizado' => ['TrabajadoHfcRealizado'],
				'reparacioneshfc_objetado' => ['TrabajadoReparacionesObjetadaHfc'],
				'reparacioneshfc_transferido' => ['TrabajadoTransfHfc'],

				'reparacionesgpon_realizado' => ['TrabajadoReparacionesGpon'],
				'reparacionesgpon_objetado' => ['TrabajadoObjetadaGpon'],
				'reparacionesgpon_transferido' => ['TrabajadoTransfGpon'],

				'reparacionesdth_realizado' => ['TrabajadoDth'],
				'reparacionesdth_objetado' => ['TrabajadoObjetadaDth'],
				'reparacionesdth_transferido' => ['TrabajadoTransferidoDth'],

				'reparacionescobre_realizado' => ['TrabajadoReparacionCobre'],
				'reparacionescobre_objetado' => ['TrabajadoObjetadaCobre'],
				'reparacionescobre_transferido' => ['TrabajadoCobreTransferido'],


			];

			$tipo_actividad_properties = [

				// INSTALACIONES
				'instalacionhfc_realizada' => ['tipo_actividad'] ,
				'instalacionhfc_objetada' => ['tipo_actividad'],
				'instalacionhfc_anulada' => ['tipo_actividad'],
				'instalacionhfc_transferida' => ['tipo_actividad'],
				'instalaciongpon_anulada' => ['tipo_actividadGpon'],
				'instalaciongpon_objetada' => ['tipo_actividadGpon'],
				'instalaciongpon_realizada' => ['tipo_actividadGpon'],
				'instalaciongpon_transferida' => ['tipo_actividadGpon'],
				'instalaciondth_realizada' => ['tipo_actividadDth'],
				'instalaciondth_objetada' => ['tipo_actividadDth'],
				'instalaciondth_anulada' => ['tipo_actividadDth'],
				'instalacioncobre_realizada' => ['tipo_actividadCobre'],
				'instalacioncobre_objetado' => ['tipo_actividadCobre'],
				'instalacioncobre_anulada' => ['tipo_actividadCobre'],
				'instalacionadsl_realizada' => ['tipo_actividadAdsl'],
				'instalacionadsl_objetada' => ['tipo_actividadAdsl'],
				'instalacionadsl_anulada' => ['tipo_actividadAdsl'],

				// REPARACIONES
				'reparacioneshfc_realizado' => ['TipoActividadReparacionHfc'],
				'reparacioneshfc_objetado' => ['TipoActividadReparacionHfc'],
				'reparacioneshfc_transferido' => ['TipoActividadReparacionHfc'],

				'reparacionesgpon_realizado' => ['TipoActividadReparacionGpon'],
				'reparacionesgpon_objetado' => ['TipoActividadReparacionGpon'],
				'reparacionesgpon_transferido' => ['TipoActividadReparacionGpon'],

				'reparacionesdth_realizado' => ['TipoActividadReparacionDth'],
				'reparacionesdth_objetado' => ['TipoActividadReparacionDth'],
				'reparacionesdth_transferido' => ['TipoActividadReparacionDth'],

				'reparacionescobre_realizado' => ['TipoActividadReparacionCobre'],
				'reparacionescobre_objetado' => ['TipoActividadReparacionCobre'],
				'reparacionescobre_transferido' => ['TipoActividadReparacionCobre'],

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