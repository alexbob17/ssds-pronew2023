<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;

use SSD\Http\Requests;

use Illuminate\Pagination\Paginator;

use Carbon\Carbon;

use PDO;


class RegistroTecnicoController extends Controller
{

    public function showGuardar()
	{		
		$breadcrumb = [
				['name' => 'Tecnicos - Registro' ]
		];		
		
		return view('tecnicos/guardar')
			->with('page_title', 'Registro - Tecnicos')
			->with('navigation', 'Tecnicos');
	}
  


public function store(Request  $request)
{
    $codigo_tecnico = $request->input('codigo_tecnico');
    $tecnico = $request->input('tecnico');
    $telefono = $request->input('telefono');

    // Guardar los datos en el archivo JSON
    $data = [
        'CODIGO' => $codigo_tecnico,
        'NOMBRE' => $tecnico,
        'NUMERO' => $telefono
    ];
    

    // Obtener los datos existentes del archivo
    $jsonPath = public_path('Json/CodigoTecnico.json');
    $fileContent = file_get_contents($jsonPath);
    $fileData = json_decode($fileContent, true);


    // Validar si el código del técnico ya existe
  // Validar si el código del técnico ya existe
    foreach ($fileData as $value) {
        if ($value['CODIGO'] == $codigo_tecnico) {
            $message = "El código del técnico ya existe";
            $fileData = json_decode(file_get_contents($jsonPath), true);

            return view('tecnicos.guardar')
                ->with('error', 'Error al guardar el registro.')
                ->with('message', $message)
                ->with('page_title', 'Registro - Tecnicos')
                ->with('navigation', 'Tecnicos');
        }
    }


    // Agregar los nuevos datos al final del archivo
    $fileData[] = $data;

    // Guardar los datos actualizados en el archivo JSON
    file_put_contents($jsonPath, json_encode($fileData));
    
    // Obtener los datos actualizados del archivo
    $data = json_decode(file_get_contents($jsonPath), true);
    
    usort($data, function($a, $b) {
        return strcmp($a['CODIGO'], $b['CODIGO']);
    });
    
    // Redirigir a la página de éxito
    $message = "Técnico registrado correctamente";
    return view('tecnicos.guardar')
        ->with('success', 'Registro guardado exitosamente.')
        ->with('message', $message)
        ->with('page_title', 'Registro - Tecnicos')
        ->with('navigation', 'Tecnicos');
    
        
}



public function deleteRegistro(Request $request, $codigo)
{
    // Leer el contenido del archivo JSON
    $jsonString = file_get_contents(public_path('Json/CodigoTecnico.json'));
    $data = json_decode($jsonString, true);

    // Buscar el registro que deseas eliminar en la matriz de datos resultante
    foreach ($data as $key => $registro) {
        if ($registro['CODIGO'] == $codigo) {
            // Eliminar el registro de la matriz
            unset($data[$key]);
            break;
        }
    }

    // Codificar la matriz de datos actualizada en formato JSON
    $jsonUpdated = json_encode($data);

    // Escribir el contenido actualizado en el archivo JSON
    file_put_contents(public_path('Json/CodigoTecnico.json'), $jsonUpdated);

    // Redireccionar a la página de visualización de registros
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'El registro ha sido eliminado correctamente.'
        ]);
    } else {
        return view('tecnicos/registro', compact('data'))
            ->with('page_title', 'Registro - Tecnicos')
            ->with('navigation', 'Tecnicos');
    }
}


public function BuscarTecnico(Request $request) {
    $codigo_tecnico = $request->input('codigo_tecnico');

    // Obtener el valor de codigo_tecnico enviado por el formulario
    $jsonPath = public_path('Json/CodigoTecnico.json');

    // Leer el contenido del archivo JSON
    $jsonString = file_get_contents($jsonPath);
    $dataCodigo = json_decode($jsonString, true);

    // Realizar la búsqueda por el campo "CODIGO"
    $results = [];
    foreach ($dataCodigo as $registro) {
        if ($registro['CODIGO'] == $codigo_tecnico) {
            $results[] = $registro;
        }
    }

    // Asignar los resultados a la variable $data
    $data = new LengthAwarePaginator(
        $results,
        count($results),
        10,
        1,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    // Retornar los resultados en JSON o en la vista según corresponda
    if ($request->ajax()) {
        return response()->json($results);
    } else {
        return view('tecnicos.registro', compact('results', 'data'))
            ->with('page_title', 'Tecnicos')
            ->with('navigation', 'Tecnicos');
    }
}



public function LeerTecnicos()
{

    $jsonPath = public_path('Json/CodigoTecnico.json');
    $dataJ = json_decode(file_get_contents($jsonPath), true);

    usort($dataJ, function($a, $b) {
        return strcmp($a['CODIGO'], $b['CODIGO']);
    });
    
    $perPage = 10;
    $currentPage = request()->get('page', 1);
    $offset = ($currentPage - 1) * $perPage;
    $results = array_slice($dataJ, $offset, $perPage);
    $count = count($dataJ);
    
    $data = new LengthAwarePaginator(
        $results,
        $count,
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );
    
    return view('tecnicos/registro', compact('data'))
        ->with('page_title', 'Tecnicos')
        ->with('navigation', 'Tecnicos')
        ->with('queryParams', ['page' => $data->currentPage()]);
    
}

    
 
}