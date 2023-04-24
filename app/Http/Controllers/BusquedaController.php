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



class BusquedaController extends Controller
{
    public function showBusquedas()
	{		
		$breadcrumb = [
				['name' => 'Busqueda - Saturado' ]
		];		
		
		return view('llamadashome/busqueda')
			->with('page_title', 'Busqueda - Registros')
			->with('navigation', 'Busqueda - Registros');
	}


	public function generarBusqueda(Request $request)
    {
        $NumeroOrden = $request->input('NordenBusqueda');
        

		$columnas = [
			'instalacionhfc_realizada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
			'instalacionhfc_objetada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
			'instalacionhfc_anulada' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
			'instalacionhfc_transferida' => ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc'],
			'instalaciongpon_anulada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
			'instalaciongpon_objetada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
			'instalaciongpon_realizada' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
			'instalaciongpon_transferida' => ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon'],
		  ];
		  $resultados = [];
		  foreach ($columnas as $tabla => $columnas_tabla) {
			foreach ($columnas_tabla as $columna) {
			  $resultados_tabla = DB::table($tabla)
									->where($columna, '=', $NumeroOrden)
									->get();
			  $resultados = array_merge($resultados, $resultados_tabla);
			}
		  }

		//   dd($resultados );
		  return view('llamadashome/busqueda', [
			'resultados' => $resultados,
		])
			->with('page_title', 'Busqueda - Registros')
			->with('navigation', 'Busqueda - Registros');
					
	}
}