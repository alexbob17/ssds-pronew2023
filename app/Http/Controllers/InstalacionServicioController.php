<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class InstalacionServicioController extends Controller
{
		
    public function store(Request $request)
{
    $tecnologia = $request->input('tecnologia');

    switch ($tecnologia) {
        case "ADSL":
            $codigo_tecnico = $request->input('codigo_tecnico');
            $telefono = $request->input('telefono');
            $tecnico = $request->input('tecnico');
            $motivo_llamada = $request->input('motivo_llamada');
            $tecnologia = $request->input('tecnologia');
            $tipo_orden = $request->input('tipo_orden');
            $orden_internetadsl = $request->input('orden_internetadsl');
            $sap_adsl = $request->input('sap_adsl');
            $trabajado_adsl = $request->input('trabajado_adsl');
            $materiales_adsl = $request->input('materiales_adsl');
            $obv_adsl = $request->input('obv_adsl');
            $tipoactividad_adsl = $request->input('tipoactividad_adsl');

            // Guarda en la tabla instalacion_adsl
            $instalacion_adsl = new InstalacionAdsl;
            $instalacion_adsl->codigo_tecnico = $codigo_tecnico;
            $instalacion_adsl->telefono = $telefono;
            $instalacion_adsl->tecnico = $tecnico;
            $instalacion_adsl->motivo_llamada = $motivo_llamada;
            $instalacion_adsl->tecnologia = $tecnologia;
            $instalacion_adsl->tipo_orden = $tipo_orden;
            $instalacion_adsl->orden_internetadsl = $orden_internetadsl;
            $instalacion_adsl->sap_adsl = $sap_adsl;
            $instalacion_adsl->trabajado_adsl = $trabajado_adsl;
            $instalacion_adsl->materiales_adsl = $materiales_adsl;
            $instalacion_adsl->obv_adsl=$obv_adsl;
                break;
            case "DTH":
                // $sap = $request->input('sap');
                break;
            case "COBRE":
                // $syreng = $request->input('syreng');
                break;
            case "GPON":
                // $georeferencia = $request->input('georeferencia');
                break;
            default:
                break;
        }
    }
    

	public function showRegistro()
	{		
		$breadcrumb = [
				['name' => 'Llamadas - Saturado' ]
		];		
		
		return view('instalacionservicio/registro')
			->with('page_title', 'Llamadas - Servicio')
			->with('navigation', 'Llamadas');
	}

    public function leerJson()
    {
    $data = file_get_contents(public_path('public\Json\Localizaciones.json'));
    $datos = json_decode($data, true);

    return view('instalacionservicio/registro', compact('datos'));
    }



   

}