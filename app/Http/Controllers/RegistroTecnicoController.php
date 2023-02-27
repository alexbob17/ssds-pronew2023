<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;



// use App\Http\Requests\TecnicoRequest;



use SSD\Http\Requests;

class RegistroTecnicoController extends Controller
{

    public function showTecnicos()
	{		
		$breadcrumb = [
				['name' => 'Tecnico- Saturado' ]
		];		
		
		return view('tecnicos/registro')
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

    
        // Redirigir a la página de éxito
        $message = "Técnico registrado correctamente";
        return view('tecnicos/registro', compact('data'))
            ->with('success', 'Registro guardado exitosamente.')
            ->with('message', $message)
            ->with('page_title', 'Registro - Tecnicos')
            ->with('navigation', 'Tecnicos');
    }



    // public function store(Request $request)
    // {
    //     $codigo_tecnico = $request->input('codigo_tecnico');
    //     $tecnico = $request->input('tecnico');
    //     $telefono = $request->input('telefono');
    
    //     // Guardar los datos en el archivo JSON
    //     $data = [
    //         'CODIGO' => $codigo_tecnico,
    //         'NOMBRE' => $tecnico,
    //         'NUMERO' => $telefono
    //     ];
        
    //     // Crear el archivo JSON si no existe
    //     if (!Storage::exists('public/Json/RegistroTecnico.json')) {
    //         Storage::put('public/Json/RegistroTecnico.json', json_encode([]));
    //     }
    
    //     // Obtener los datos existentes del archivo
    //     $fileData = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);
    
    //     // Validar si el código del técnico ya existe
    //     foreach ($fileData as $value) {
    //         if ($value['CODIGO'] == $codigo_tecnico) {
    //             $message = "El código del técnico ya existe";
    //             $fileData = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);
    
    //             return view('tecnicos/registro',compact('fileData'))
    //                 ->with('error', 'Error al guardar el registro.')
    //                 ->with('message', $message)
    //                 ->with('page_title', 'Registro - Tecnicos')
    //                 ->with('navigation', 'Tecnicos');
    //         }
    //     }
    
    //     // Agregar los nuevos datos al final del archivo
    //     $fileData[] = $data;
    
    //     // Guardar los datos actualizados en el archivo JSON
    //     Storage::put('public/Json/RegistroTecnico.json', json_encode($fileData));
    
    //     // Obtener los datos actualizados del archivo y paginar los resultados
    //     $data = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);
    //     $perPage = 10; // Cambiar por la cantidad de elementos que desea mostrar por página
    //     $currentPage = 1; // Por defecto, muestra la primera página
    //     $pagedData = array_slice($data, ($currentPage - 1) * $perPage, $perPage);
    //     $paginator = new Paginator($pagedData, count($data), $perPage, $currentPage, [
    //         'path' => route('tecnicos.registro'), // Cambiar por la ruta de la página
    //         'query' => $request->query(), // Para mantener cualquier parámetro de consulta en la URL de la página
    //     ]);
    
    //     // Redirigir a la página de éxito con los resultados paginados
    //     $message = "Técnico registrado correctamente";
    //     return view('tecnicos/registro', compact('paginator'))
    //         ->with('success', 'Registro guardado exitosamente.')
    //         ->with('message', $message)
    //         ->with('page_title', 'Registro - Tecnicos')
    //         ->with('navigation', 'Tecnicos');
    // }

    

    public function LeerTecnicos()
{
    // Obtener los datos del archivo JSON
    $data = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

    // dd($data);
    // Pasar los datos a la vista
    return view('tecnicos/registro', compact('data'))
        ->with('page_title', 'Registro - Tecnicos')
        ->with('navigation', 'Tecnicos');
}




public function update(Request $request, $id)
{
    // Actualizar los datos en el archivo JSON
    // ...

    // Redirigir de vuelta a la vista de registro
    return redirect()->route('registro_tecnico.index');
}


public function destroy($codigo_tecnico)
{
    // Obtener los datos existentes del archivo
    $fileData = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

    // Eliminar el técnico con el código especificado
    foreach ($fileData as $key => $value) {
        if ($value['CODIGO'] == $codigo_tecnico) {
            unset($fileData[$key]);
        }
    }

    // Guardar los datos actualizados en el archivo JSON
    Storage::put('public/Json/RegistroTecnico.json', json_encode(array_values($fileData)));

    // Retornar una respuesta exitosa
    return response()->json(['success' => true]);
}



    
 
}