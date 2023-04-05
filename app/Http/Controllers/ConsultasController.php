<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class ConsultasController extends Controller
{
    
    public function showConsultas()
	{		
		$breadcrumb = [
				['name' => 'Consultas - Saturado' ]
		];		
		
		return view('llamadashome/consultas')
			->with('page_title', 'Consultas - Registro')
			->with('navigation', 'Consultas');
	}

}