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




class RegistroTecnicoController extends Controller
{




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
    
    // Crear el archivo JSON si no existe
    if (!Storage::exists('public/Json/RegistroTecnico.json')) {
        Storage::put('public/Json/RegistroTecnico.json', json_encode([]));
    }

    // Obtener los datos existentes del archivo
    $fileData = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

    // Validar si el código del técnico ya existe
    foreach ($fileData as $value) {
        if ($value['CODIGO'] == $codigo_tecnico) {
            $message = "El código del técnico ya existe";
            $fileData = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

            return view('tecnicos/registro',compact('fileData'))
                ->with('error', 'Error al guardar el registro.')
                ->with('message', $message)
                ->with('page_title', 'Registro - Tecnicos')
                ->with('navigation', 'Tecnicos');
        }
    }

    // Agregar los nuevos datos al final del archivo
    $fileData[] = $data;

    // Guardar los datos actualizados en el archivo JSON
    Storage::put('public/Json/RegistroTecnico.json', json_encode($fileData));

    // Obtener los datos actualizados del archivo
    $data = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

    usort($data, function($a, $b) {
        return strcmp($a['CODIGO'], $b['CODIGO']);
    });

    // Redirigir a la página de éxito
    $message = "Técnico registrado correctamente";
    return view('tecnicos/registro', compact('data'))
        ->with('success', 'Registro guardado exitosamente.')
        ->with('message', $message)
        ->with('page_title', 'Registro - Tecnicos')
        ->with('navigation', 'Tecnicos');
}



public function deleteRegistro(Request $request, $codigo)
{

    // dd($codigo);
    // Leer el contenido del archivo JSON
    $jsonString = file_get_contents(storage_path('app/public/Json/RegistroTecnico.json'));
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
    file_put_contents(storage_path('app/public/Json/RegistroTecnico.json'), $jsonUpdated);

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




public function LeerTecnicos()
{
    $dataJ = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

    usort($dataJ, function($a, $b) {
        return strcmp($a['CODIGO'], $b['CODIGO']);
    });

    // $data = $dataJ;

    $perPage = 10;
    $currentPage = request()->get('page', 1);
    $data= array_slice($dataJ, ($currentPage - 1) * $perPage, $perPage);
    $data= new LengthAwarePaginator($data, count($dataJ), $perPage, $currentPage);

    $tecnicosIndexRoute = route('mostrar_tecnicos');

    return view('tecnicos/registro', compact('data'))
        ->with('page_title', 'Registro - Tecnicos')
        ->with('navigation', 'Tecnicos')
        ->with('queryParams', ['page' => $data->currentPage()]);
}


// public function LeerTecnicos()
// {
//     $dataJ = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

//     usort($dataJ, function($a, $b) {
//         return strcmp($a['CODIGO'], $b['CODIGO']);
//     });

//     $perPage = count($dataJ);
//     $currentPage = request()->get('page', 1);
//     $data= array_slice($dataJ, ($currentPage - 1) * $perPage, $perPage);
//     $data= new LengthAwarePaginator($data, count($dataJ), $perPage, $currentPage);

//     return view('tecnicos/registro', compact('data'))
//         ->with('page_title', 'Registro - Tecnicos')
//         ->with('navigation', 'Tecnicos')
//         ->with('queryParams', ['page' => $data->currentPage()]);
// }








    
 
}