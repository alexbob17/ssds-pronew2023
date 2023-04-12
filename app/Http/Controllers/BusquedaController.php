<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

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
}