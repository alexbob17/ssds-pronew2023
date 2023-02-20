<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class LlamadasServicioController extends Controller
{
		



    public function showPostVentas()
	{		
		$breadcrumb = [
				['name' => 'Postventas - Saturado' ]
		];		
		
		return view('llamadashome/postventa')
			->with('page_title', 'Postventas - Servicio')
			->with('navigation', 'Postventas');
	}


	public function showInstalaciones()
	{		
		$breadcrumb = [
				['name' => 'Instalaciones - Saturado' ]
		];		
		
		return view('llamadashome/instalaciones')
			->with('page_title', 'Instalaciones - Servicio')
			->with('navigation', 'Instalaciones');

			
	}


   

}