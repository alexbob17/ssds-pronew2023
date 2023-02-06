<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class DesperfectoController extends Controller
{
    public function showServicioEfectiva()
	{		
		$breadcrumb = [
			['name' => 'Daños Preparacion Servicios Efectiva - Saturado' ]
	];	
	
			return view('desperfecto/preparacionserviciosefectiva')
			->with('page_title', 'Daño - Preparacion Servicios Efectiva')
			->with('navigation', 'Daño');
	}

	public function showServicioTransferencia()
	{		
		$breadcrumb = [
			['name' => 'Daños Preparacion Servicios Transferencia - Saturado' ]
	];	
	
			return view('desperfecto/preparacionserviciotransferencia')
			->with('page_title', 'Daño - Preparacion Servicios Transferencia')
			->with('navigation', 'Daño');
	}
}