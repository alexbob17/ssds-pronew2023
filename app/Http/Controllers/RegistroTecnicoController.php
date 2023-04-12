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

            return view('tecnicos/guardar')
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
    return view('tecnicos/guardar')
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



// public function LeerTecnicos(Request $request)
// {
//     // Configura la conexión a la base de datos
//     $host = "localhost";
//     $username = "ssd_admin";
//     $password = "\$\$D@DM!N";
//     $dbname = "ssddb";
//     $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";


//    // Crea la conexión
//     try {
//         $pdo = new PDO($dsn, $username, $password);
//     } catch (PDOException $e) {
//         die("No se pudo conectar a la base de datos: " . $e->getMessage());
//     }

//     // Obtener los datos de la tabla Tecnicos
//     $page = $request->query('page', 1);
//     $perPage = 10;
//     $offset = ($page - 1) * $perPage;
//     $sql = "SELECT * FROM Tecnicos ORDER BY CODIGO LIMIT :perPage OFFSET :offset";
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':perPage', $perPage, PDO::PARAM_INT);
//     $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
//     $statement->execute();
//     $results = $statement->fetchAll(PDO::FETCH_ASSOC);

//     // Obtener el número total de filas en la tabla Tecnicos
//     $sqlCount = "SELECT COUNT(*) AS count FROM Tecnicos";
//     $statementCount = $pdo->prepare($sqlCount);
//     $statementCount->execute();
//     $count = $statementCount->fetchColumn();

//     // Crear la paginación
//     $data = new LengthAwarePaginator(
//         $results,
//         $count,
//         $perPage,
//         $page,
//         ['path' => $request->url(), 'query' => $request->query()]
//     );

//     return view('tecnicos/registro', compact('data'))
//         ->with('page_title', 'Registro - Tecnicos')
//         ->with('navigation', 'Tecnicos')
//         ->with('queryParams', $request->query());


// }





public function LeerTecnicos()
{
    $dataJ = json_decode(Storage::get('public/Json/RegistroTecnico.json'), true);

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