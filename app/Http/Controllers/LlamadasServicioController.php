<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InstalacionAdslRealizada;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Storage;


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
	


	// public function store(Request $request)
    // {
    //     $tecnologia = $request->input('tecnologia');

    //     // Evaluamos la tecnología seleccionada
    //     switch ($tecnologia) {
    //         case 'HFC':
    //             break;
    //         case 'GPON':
    //             break;
    //         case 'COBRE':
    //             break;
    //         case 'DTH':
    //             break;
    //         case 'ADSL':
    //             $selectedFields = [
    //                 'codigo_tecnico',
    //                 'telefono',
    //                 'tecnico',
    //                 'motivo_llamada',
    //                 'select_orden',
    //                 'dpto_colonia',
    //                 'tipo_actividadAdsl',
    //                 'orden_internetadsl',
    //                 'GeoRefAdsl',
    //                 'trabajado_adsl',
    //                 'obv_adsl',
    //                 'Recibe_adsl',
    //                 'materialeAdsl'
    //             ];

    //             $data = [];

    //             foreach ($selectedFields as $fieldName) {
    //                 $value = $request->input($fieldName);
    //                 $data[$fieldName] = $value;
    //             }

    //             // Evaluamos si la tecnología ADSL fue realizada u objetada
    //             if ($data['tipo_actividadAdsl'] == 'REALIZADA') {
    //                 // Incluimos los datos adicionales para la tecnología ADSL realizada
    //                 $dataAdslRealizada = new InstalacionAdslRealizada($data);

    //                 // Guardamos la instancia en la base de datos
    //                 $dataAdslRealizada->save();

    //                 return view('llamadashome/instalaciones')
    //                     ->with('success', 'Registro guardado exitosamente.')
    //                     ->with('page_title', 'Instalaciones - Servicio Guardado')
    //                     ->with('navigation', 'Instalaciones');
    //             } elseif ($data['tipo_actividadAdsl'] == 'OBJETADA') {
    //             }

    //             break;

    //         // En caso de que no se haya seleccionado una tecnología válida, no hacemos nada
    //         default:
    //             break;
    //     }

    //     // Redireccionamos a la página de inicio
    //     return redirect('/');
    // }

public function store(Request $request){
	$tecnologia = $request->input('tecnologia');
	switch ($tecnologia) {
		case 'HFC':
			// Guardamos los datos en un archivo txt
			break;
		case 'GPON':
			// Guardamos los datos en un archivo txt
			break;
		case 'COBRE':
			// Guardamos los datos en un archivo txt
			break;
		case 'DTH':
			// Guardamos los datos en un archivo txt
		case 'ADSL':
			$selectedFields = ['codigo_tecnico', 'telefono', 'tecnico', 'motivo_llamada',
			'select_orden','dpto_colonia','tipo_actividadAdsl','orden_internetAdsl','GeoRefAdsl','trabajado_adsl','obv_adsl','Recibe_adsl',
		'materialeAdsl'];

			$data = [];

			foreach ($selectedFields as $fieldName) {
			$value = $request->input($fieldName);
			$data[$fieldName] = $value;
			}
			
				// Agrega el resto de tu código aquí...
			$codigo_tecnico = $request->input('codigo_tecnico');
			$telefono = $request->input('telefono');
			$tecnico = $request->input('tecnico');
			$motivo_llamada = $request->input('motivo_llamada');
			$select_orden = $request->input('select_orden');
			$dpto_colonia = $request->input('dpto_colonia');
			$tipo_actividadAdsl = $request->input('tipo_actividadAdsl');
			$orden_internetadsl = $request->input('orden_internetadsl');
			$GeoRefAdsl  = $request->input('GeoRefAdsl');
			$trabajado_adsl = $request->input('trabajado_adsl');
			$obv_adsl = $request->input('obv_adsl');
			$Recibe_adsl = $request->input('Recibe_adsl');
			$materialeAdsl = $request->input('materialeAdsl');
			
				// Evaluamos si la tecnología ADSL fue realizada u objetada
			if ($tipo_actividadAdsl == 'REALIZADA') {
					// Incluimos los datos adicionales para la tecnología ADSL realizada
				$DataAdslRealizada = [
					'codigo_tecnico' => $codigo_tecnico,
					'telefono' => $telefono,
					'tecnico' => $tecnico,
					'motivo_llamada' => $motivo_llamada,
					'select_orden' => $select_orden,
					'dpto_colonia' => $dpto_colonia,
					'tipo_actividadAdsl' => $tipo_actividadAdsl,
					'orden_internetadsl' => $orden_internetadsl,
					'GeoRefAdsl' => $GeoRefAdsl,
					'trabajado_adsl' => $trabajado_adsl,
					'obv_adsl' => $obv_adsl,
					'Recibe_adsl' => $Recibe_adsl,
					'materialeAdsl' => $materialeAdsl,
					];
			
					// Guardamos los datos actualizados en el archivo JSON
					Storage::put('public/Json/RegistroAdslRealizada.json', json_encode($DataAdslRealizada));
					

					
					return view('llamadashome/instalaciones')
						->with('success', 'Registro guardado exitosamente.')
						->with('page_title', 'Instalaciones - Servicio Guardado')
						->with('navigation', 'Instalaciones');
				} else if ($tipo_actividadAdsl == 'OBJETADA') {
					// Guardamos los datos en un archivo JSON para ADSL Objetada
			
					
				}
				break;
			// En caso de que no se haya seleccionado una tecnología válida, no hacemos nada
			break;
	}
}

}

   