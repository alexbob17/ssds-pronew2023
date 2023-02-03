<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class LlamadasController extends Controller
{
    
    public function getRegistro()
	{		
		$breadcrumb = [
				['name' => 'Registro llamadas - Saturado' ]
		];		
		
		return view('llamadas/registro')
			->with('page_title', 'Llamadas - Registro de Llamadas');
	}

    public function  getBuscar() {
		$breadcrumb = [
				['name' => 'Llamadas - Búsqueda' ]
		];
	
		$opciones_busqueda = [
				'ticket'			=> 'Ticket',
				'id_solicitud'	 	=> 'ID Solicitud/Daño',
				'id_producto'		=> 'ID Producto',
		];
	
		return view('llamadas/buscar')
			->with('page_title', 'Búsqueda - Llamadas')
			->with('navigation', 'llamadas')
			->with('breadcrumb', $breadcrumb)
			->with('opciones_busqueda', $opciones_busqueda);
			
	}


    public function getReporteLlamadas() {
		$breadcrumb = [
				['name' => 'Reporte - Llamadas ' ]
		];
	
		return view('llamadas/reporte_llamadas')
			->with('page_title', 'Reporte - Llamadas')
			->with('navigation', 'llamadas')
			->with('breadcrumb', $breadcrumb);
	}
    

}