<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class InstalacionServicioController extends Controller
{
    
    public function showHfc()
	{		
		$breadcrumb = [
			['name' => 'Instalacion Servicio HFC - Saturado' ]
	];	
	
			return view('instalacionservicio/hfc')
			->with('page_title', 'Instalacion Servicio - HFC')
			->with('navigation', 'instalacion');
	}

		
    public function getRegistro(Request $request)
    {
        $insta = new Instalacionhfc();
        $insta->codigo_tecnico = $request->input('codigo_tecnico');
        $insta->telefono = $request->input('telefono');
        $insta->motivo_llamada = $request->input('motivo_llamada');
        $insta->tecnico = $request->input('tecnico');
        $insta->tecnologia = $request->input('tecnologia');
        $insta->tipo_orden = $request->input('tipo_orden');
        $insta->orden_tv = $request->input('orden_tv');
        $insta->orden_internet = $request->input('orden_internet');
        $insta->orden_linea = $request->input('orden_linea');
        $insta->motivo_actividad = $request->input('motivo_actividad');
        $insta->syreng = $request->input('syreng');
        $insta->sap = $request->input('sap');
        $insta->equipos_tv = $request->input('equipos_tv');
        $insta->equipo_modem = $request->input('equipo_modem');
        $insta->numero_voip = $request->input('numero_voip');
        $insta->georeferencia = $request->input('georeferencia');
        $insta->observaciones = $request->input('observaciones');
        $insta->recibe = $request->input('recibe');
        $insta->trabajado = $request->input('trabajado');
        $insta->fecha_creacion = $request->input('fecha_creacion');
        $insta->fecha_atencion = $request->input('fecha_atencion');
        $insta->periodo_creacion = $request->input('periodo_creacion');
        $insta->periodo_atencion = $request->input('periodo_atencion');
        $insta->username_creacion = $request->input('username_creacion');
        $insta->username_atencion = $request->input('username_atencion');
	}

	public function showGpon()
	{		
		$breadcrumb = [
				['name' => 'Instalacion Servicio GPON - Saturado' ]
		];		
		
		return view('instalacionservicio/gpon')
			->with('page_title', 'Instalacion - Servicio GPON')
			->with('navigation', 'instalacion');
	}

	public function showAdsl()
	{		
		$breadcrumb = [
				['name' => 'Instalacion Servicio ADSL - Saturado' ]
		];		
		
		return view('instalacionservicio/adsl')
			->with('page_title', 'Instalacion - Servicio ADSL')
			->with('navigation', 'instalacion');
	}

	public function showCobre()
	{		
		$breadcrumb = [
				['name' => 'Instalacion Servicio COBRE - Saturado' ]
		];		
		
		return view('instalacionservicio/cobre')
			->with('page_title', 'Instalacion - Servicio Cobre')
			->with('navigation', 'instalacion');
	}

	public function showDth()
	{		
		$breadcrumb = [
				['name' => 'Instalacion Servicio DTH - Saturado' ]
		];		
		
		return view('instalacionservicio/dth')
			->with('page_title', 'Instalacion - Servicios DTH')
			->with('navigation', 'instalacion');
	}

   

}