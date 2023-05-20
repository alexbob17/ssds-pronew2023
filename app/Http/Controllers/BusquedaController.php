<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

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
				'reparacionesadsl_realizado' => ['OrdenAdslRealizado'],
				'reparacionesadsl_objetado' => ['OrdenObjAdsl'],
				'reparacionesadsl_transferido' => ['OrdenTransferidoAdsl'],
				

				// POSTVENTAS
				'postventacambiocobre_realizada' => ['OrdenCambioCobre'],
				'postventacambiocobre_objetada' => ['OrdenObjCambioCobre'],
				'postventacambiocobre_anulada' => ['OrdenAnuladaCambioCobre'],
				'postventaretirodth_anulada' =>['OrdenRetiroAnulacionDth'],
				'postventaretirodth_realizada' =>['OrdenRetiroDth'],
				'postventaretirohfc_realizada' =>['OrdenRetiroHfc'],
				'postventaretirohfc_anulada' =>['OrdenRetiroAnulacionHfc'],
				'postventamigracion_realizada' =>['NOrdenMigracionHfc'],
				'postventamigracion_objetada' =>['OrdenMigracionHfcObj'],
				'postventamigracion_anulada' =>['NOrdenMigracionAnuladaHfc'],
				'postventamigracion_transferida' =>['OrdenMigracionTranfHfc'],
				'postventacambioequipodth_realizado' =>['OrdenEquipoDth'],
				'postventacambioequipodth_objetado' =>['OrdenEquipoObjDth'],
				'postventacambioequipodth_anulada' =>['OrdenEquipoAnulada_Dth'],
				'postventacambioequipoadsl_realizado' =>['OrdenEquipoAdsl'],
				'postventacambioequipoadsl_objetado' =>['OrdenEquipoObjAdsl'],
				'postventacambioequipoadsl_anulada' =>['OrdenAnuladaEquipoAdsl'],
				'postventacambioequipogpon_realizado' =>['NOrdenEquipoGpon'],
				'postventacambioequipogpon_objetado' =>['NOrdenObjEquipoGpon'],
				'postventacambioequipogpon_anulado' =>['OrdenEquipoAnuladaGpon'],
				'postventacambioequipohfc_realizado' =>['NOrdenEquipoHfc'],
				'postventacambioequipohfc_objetado' =>['NordenObjEquipoHfc'],
				'postventacambioequipohfc_anulada' =>['OrdenAnuladaEquipoHfc'],
				'postventaadicionhfc_realizado' =>['NOrdenAdicionHfc'],
				'postventaadicionhfc_objetado' =>['OrdenAdicionObjHfc'],
				'postventaadicionhfc_anulada' =>['NOrdenAdicionAnuladaHfc'],
				'postventaadiciongpon_realizada' =>['NOrdenAdicionGpon'],
				'postventaadiciongpon_objetada' =>['NOrdenAdicionObjGpon'],
				'postventaadiciongpon_anulada' =>['NOrdenAdicionAnuladaGpon'],
				'postventaadiciondth_realizado' =>['NOrdenAdicionDth'],
				'postventaadiciondth_objetado' =>['NOrdenAdicionObjDth'],
				'postventaadiciondth_anulado' =>['OrdenAdicionAnulada_Dth'],
				'postventatrasladohfc_realizado' =>['OrdenTvTrasladoHfc','OrdenInternetTrasladoHfc','OrdenLineaTrasladoHfc'],
				'postventatrasladohfc_objetado' =>['OrdenTvObjetadoTrasladoHfc','OrdenIntObjTrasladoHfc','OrdenLineaObjetadoTrasladoHfc'],
				'postventatrasladohfc_anulada' =>['OrdenTvAnulTraslHfc','OrdenInterAnulTraslHfc','OrdenLineaAnulTraslHfc'],
				'postventatrasladohfc_transferido' =>['OrdenTvTransferidoHfc','OrdenInternetTransferidoHfc','OrdenLineaTransferidoHfc'],
				'postventatrasladogpon_realizado' =>['OrdenTvTrasladoGpon','OrdenInternetTrasladoGpon','OrdenLineaTrasladoGpon'],
				'postventatrasladogpon_objetado' =>['OrdenTvTrasladoObjGpon','OrdenInterObjTraslGpon','OrdenLineaTraslObjGpon'],
				'postventatrasladogpon_anulado' =>['OrdenTvTraslAnuladoGpon','OrdenIntTrasladoAnulGpon','OrdenLineaTraslAnulGpon'],
				'postventatrasladogpon_transferido' =>['OrdenTvTrasladoTransGpon','OrdenIntTransladoGpon','OrdenLineaTrasladoTransGpon'],
				'postventatrasladoadsl_realizada' =>['NOrdenTrasladosAdsl'],
				'postventatrasladoadsl_objetada' =>['OrdenObjTrasladoAdsl'],
				'postventatrasladoadsl_anulada' =>['NOrdenTrasladosAnulAdsl'],
				'postventatrasladocobre_realizado' =>['OrdenTrasladoCobre'],
				'postventatrasladocobre_objetado' =>['OrdenTrasladoObjCobres'],
				'postventatrasladocobre_anulada' =>['OrdenTrasladosCobre'],


				'postventatrasladodth_realizada' =>['OrdenTrasladoDth'],
				'postventatrasladodth_objetado' =>['OrdenTrasladoObjDth'],
				'postventatrasladodth_anulada' =>['OrdenTrasladosDth'],


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
				'instalaciondth_objetada' => ['TrabajadoObj_Dth'],
				'instalaciondth_realizada' => ['TrabajadoDthRealizado'],
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
				'reparacionesadsl_realizado' => ['TrabajadoReparacionAdsl'],
				'reparacionesadsl_objetado' => ['TrabajadoObjetadaAdsl'],
				'reparacionesadsl_transferido' => ['TrabajadoTransferidoAdsl'],

				// POSTVENTA
				'postventacambiocobre_realizada' => ['TrabajadoCambioCobre'],
				'postventacambiocobre_objetada' => ['TrabajadoObjCambioCobre'],
				'postventacambiocobre_anulada' => ['TrabajadoAnuladaCambioCobre'],
				'postventaretirodth_anulada' =>['TrabajadoRetiroAnulada_Dth'],
				'postventaretirodth_realizada' =>['TrabajadoRetiroDth'],
				'postventaretirohfc_realizada' =>['TrabajadoRetiroHfc'],
				'postventaretirohfc_anulada' =>['TrabajadoRetiroAnulada_Hfc'],
				'postventamigracion_realizada' =>['TrabajadoMigracionHfc'],
				'postventamigracion_objetada' =>['TrabajadoMigracionObjHfc'],
				'postventamigracion_anulada' =>['TrabajadoMigracionAnulada_Hfc'],
				'postventamigracion_transferida' =>['TrabajadoMigracionTransHfc'],
				'postventacambioequipodth_realizado' =>['TrabajadoEquipoDth'],
				'postventacambioequipodth_objetado' =>['TrabajadoEquipoObjDth'],
				'postventacambioequipodth_anulada' =>['TrabajadoEquipoAnulada_Dth'],
				'postventacambioequipoadsl_realizado' =>['TrabajadoEquipoAdsl'],
				'postventacambioequipoadsl_objetado' =>['TrabajadoEquipoObjAdsl'],
				'postventacambioequipoadsl_anulada' =>['TrabajadoEquipoAnulada_Adsl'],
				'postventacambioequipogpon_realizado' =>['TrabajadoEquipoGpon'],
				'postventacambioequipogpon_objetado' =>['TrabajadoObjEquipoGpon'],
				'postventacambioequipogpon_anulado' =>['TrabajadoEquipoAnulada_Gpon'],
				'postventacambioequipohfc_realizado' =>['TrabajadoEquipoHfc'],
				'postventacambioequipohfc_objetado' =>['TrabajadoObjEquipoHfc'],
				'postventacambioequipohfc_anulada' =>['TrabajadoEquipoAnulada_Hfc'],
				'postventaadicionhfc_realizado' =>['TrabajadoAdicionHfc'],
				'postventaadicionhfc_objetado' =>['TrabajadoObjAdicionHfc'],
				'postventaadicionhfc_anulada' =>['TrabajadoAdicionAnulada_Hfc'],
				'postventaadiciongpon_realizada' =>['TrabajadoAdicionGpon'],
				'postventaadiciongpon_objetada' =>['TrabajadoAdicionObjGpon'],
				'postventaadiciongpon_anulada' =>['TrabajadoAdicionAnulada_Gpon'],
				'postventaadiciondth_realizado' =>['TrabajadoAdicionDth'],
				'postventaadiciondth_objetado' =>['TrabajadoAdicionObjDth'],
				'postventaadiciondth_anulado' =>['TrabajadoAdicionAnulada_Dth'],
				'postventatrasladohfc_realizado' =>['TrabajadoTrasladoHfc'],
				'postventatrasladohfc_objetado' =>['TrabajadoObjTrasladoHfc'],
				'postventatrasladohfc_anulada' =>['TrabajadoAnuladaTraslado_Hfc'],
				'postventatrasladohfc_transferido' =>['TrabajadoTransTrasladoHfc'],
				'postventatrasladogpon_realizado' =>['TrabajadoTrasladoGpon'],
				'postventatrasladogpon_objetado' =>['TrabajadoTrasladoObjGpon'],
				'postventatrasladogpon_anulado' =>['TrabajadoAnuladaTraslado_gpon'],
				'postventatrasladogpon_transferido' =>['TrabajadoTraslTransGpon'],
				'postventatrasladoadsl_realizada' =>['TrabajadoTrasladoAdsl'],
				'postventatrasladoadsl_objetada' =>['TrabajadoTrasladoObjAdsl'],
				'postventatrasladoadsl_anulada' =>['TrabajadoTrasladoTrAnulada_Adsl'],
				'postventatrasladocobre_realizado' =>['TrabajadoTrasladoCobre'],
				'postventatrasladocobre_objetado' =>['TrabajadoTrasladoObjCobre'],
				'postventatrasladocobre_anulada' =>['TrabajadoTrasladoAnulada_Cobre'],

				'postventatrasladodth_realizada' =>['TrabajadoTrasladoDth'],
				'postventatrasladodth_objetado' =>['TrabajadoTrasladoObj_Dth'],
				'postventatrasladodth_anulada' =>['TrabajadoTrasladoAnulada_Dth'],
				

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
				'reparacionesadsl_realizado' => ['TipoActividadReparacionAdsl'],
				'reparacionesadsl_objetado' => ['TipoActividadReparacionAdsl'],
				'reparacionesadsl_transferido' => ['TipoActividadReparacionAdsl'],

				// POSTVENTA
				'postventacambiocobre_realizada' => ['TipoActividadCambioNumeroCobre'],
				'postventacambiocobre_objetada' => ['TipoActividadCambioNumeroCobre'],
				'postventacambiocobre_anulada' => ['TipoActividadCambioNumeroCobre'],
				'postventaretirodth_anulada' =>['TipoActividadReconexionDth'],
				'postventaretirodth_realizada' =>['TipoActividadReconexionDth'],
				'postventaretirohfc_realizada' =>['TipoActividadReconexionHfc'],
				'postventaretirohfc_anulada' =>['TipoActividadReconexionHfc'],
				'postventamigracion_realizada' =>['TipoActividadMigracionHfc'],
				'postventamigracion_objetada' =>['TipoActividadMigracionHfc'],
				'postventamigracion_anulada' =>['TipoActividadMigracionHfc'],
				'postventamigracion_transferida' =>['TipoActividadMigracionHfc'],
				'postventacambioequipodth_realizado' =>['TipoActividadCambioDth'],
				'postventacambioequipodth_objetado' =>['TipoActividadCambioDth'],
				'postventacambioequipodth_anulada' =>['TipoActividadCambioDth'],
				'postventacambioequipoadsl_realizado' =>['TipoActividadCambioAdsl'],
				'postventacambioequipoadsl_objetado' =>['TipoActividadCambioAdsl'],
				'postventacambioequipoadsl_anulada' =>['TipoActividadCambioAdsl'],
				'postventacambioequipogpon_realizado' =>['TipoActividadCambioGpon'],
				'postventacambioequipogpon_objetado' =>['TipoActividadCambioGpon'],
				'postventacambioequipogpon_anulado' =>['TipoActividadCambioGpon'],
				'postventacambioequipohfc_realizado' =>['TipoActividadCambioHfc'],
				'postventacambioequipohfc_objetado' =>['TipoActividadCambioHfc'],
				'postventacambioequipohfc_anulada' =>['TipoActividadCambioHfc'],
				'postventaadicionhfc_realizado' =>['TipoActividadAdicionHfc'],
				'postventaadicionhfc_objetado' =>['TipoActividadAdicionHfc'],
				'postventaadicionhfc_anulada' =>['TipoActividadAdicionHfc'],
				'postventaadiciongpon_realizada' =>['TipoActividadAdicionGpon'],
				'postventaadiciongpon_objetada' =>['TipoActividadAdicionGpon'],
				'postventaadiciongpon_anulada' =>['TipoActividadAdicionGpon'],
				'postventaadiciondth_realizado' =>['TipoActividadAdicionDth'],
				'postventaadiciondth_objetado' =>['TipoActividadAdicionDth'],
				'postventaadiciondth_anulado' =>['TipoActividadAdicionDth'],
				'postventatrasladohfc_realizado' =>['TipoActividadTrasladoHfc'],
				'postventatrasladohfc_objetado' =>['TipoActividadTrasladoHfc'],
				'postventatrasladohfc_anulada' =>['TipoActividadTrasladoHfc'],
				'postventatrasladohfc_transferido' =>['TipoActividadTrasladoHfc'],
				'postventatrasladogpon_realizado' =>['TipoActividadTrasladoGpon'],
				'postventatrasladogpon_objetado' =>['TipoActividadTrasladoGpon'],
				'postventatrasladogpon_anulado' =>['TipoActividadTrasladoGpon'],
				'postventatrasladogpon_transferido' =>['TipoActividadTrasladoGpon'],
				'postventatrasladoadsl_realizada' =>['TipoActividadTrasladoAdsl'],
				'postventatrasladoadsl_objetada' =>['TipoActividadTrasladoAdsl'],
				'postventatrasladoadsl_anulada' =>['TipoActividadTrasladoAdsl'],
				'postventatrasladocobre_realizado' =>['TipoActividadTrasladoCobre'],
				'postventatrasladocobre_objetado' =>['TipoActividadTrasladoCobre'],
				'postventatrasladocobre_anulada' =>['TipoActividadTrasladoCobre'],

				'postventatrasladodth_realizada' =>['TipoActividadTrasladoDth'],
				'postventatrasladodth_objetado' =>['TipoActividadTrasladoDth'],
				'postventatrasladodth_anulada' =>['TipoActividadTrasladoDth'],
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

			$message = "¡EXITO!";
			$messages = "REGISTRO ENCONTRADO";
			
		} else {

			$resultados = [];
			$message = "¡ERROR!";
			$messages = "NO SE ENCONTRARON RESULTADOS";
		}
		
		
		return view('llamadashome/busqueda', [
			'resultados' => $resultados,
			'NumeroOrden' => $NumeroOrden,
		])
		->with('success', true)
		->with('message', $message)
		->with('messages', $messages)
		->with('page_title', 'Busqueda - Registros')
		->with('navigation', 'Busqueda - Registros');
		
		
	}
	
}