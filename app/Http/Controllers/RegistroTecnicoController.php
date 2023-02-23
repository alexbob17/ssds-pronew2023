<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


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



    public function store(Request $request)
    {
        // Validar los datos del formulario
        // ...

        // Guardar los datos en el archivo JSON
        $codigoTecnico = $request->input('codigo_tecnico');
        $nombreTecnico = $request->input('nombre_tecnico');
        $telefono = $request->input('telefono');
        $data = [
            'codigo_tecnico' => $codigoTecnico,
            'nombre_tecnico' => $nombreTecnico,
            'telefono' => $telefono
        ];

        // Crear el archivo JSON si no existe
        if (!Storage::exists('public/Json/RegistroTecnico.json')) {
            Storage::put('public/Json/RegistroTecnico.json', json_encode([]));
        }

        // Obtener los datos existentes del archivo
        $fileData = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

        // Agregar los nuevos datos al final del archivo
        $fileData[] = $data;

        // Guardar los datos actualizados en el archivo JSON
        Storage::put('public/Json/RegistroTecnico.json', json_encode($fileData));

        // Redirigir a la página de éxito
        $message = "Técnico registrado correctamente";
        return view('tecnicos/registro' , compact('message'))
			->with('page_title', 'Registro - Tecnicos')
			->with('navigation', 'Tecnicos');
    }
    
 
}