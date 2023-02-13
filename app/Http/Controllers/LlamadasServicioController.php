<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class LlamadasServicioController extends Controller
{
		

    // public function selectView(Request $request)
    // {
    //     $viewName = $request->viewName;
    //     $page_title = 'Titulo';
    //     return view('instalacionservicio/'.$viewName, compact('page_title'));
    // }

	public function showRegistro()
	{		
		$breadcrumb = [
				['name' => 'Llamadas - Saturado' ]
		];		
		
		return view('llamadashome/registro')
			->with('page_title', 'Llamadas - Servicio')
			->with('navigation', 'Llamadas');
	}

    public function leerJson()
    {
    $data = file_get_contents(public_path('public\Json\Localizaciones.json'));
    $datos = json_decode($data, true);

    return view('llamadashome/registro', compact('datos'));
    }

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