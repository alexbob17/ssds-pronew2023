<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;

use SSD\Models\consultasRealizada;

// use Illuminate\Support\Carbon;

use Carbon\Carbon;




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


	public function storeConsultas(Request $request)
	{		
		$motivo_llamada = $request->input('motivo_llamada');
	
		switch ($motivo_llamada) {
			case 'CONSULTAS':
				$selectedFields = [
					'codigo_tecnico',
					'telefono',
					'tecnico',
					'motivo_llamada',
					'MotivoConsulta',
					'TipoMotivoConsulta',
					'OrdenConsulta',
					'ObvsConsulta',
					'codigoUnico',
				];
	
				$data = $request->only($selectedFields);

	
				// Generamos un código único de 8 caracteres
				$data['codigoUnico'] = mt_rand(10000000, 99999999);

				// Agregamos el usuario actual como creador y atendedor del registro
				$data['username_creacion'] = Auth::user()->username;
				$data['username_atencion'] = Auth::user()->username;

				
				// Comprobamos si TipoMotivoConsulta es nulo y establecemos su valor en "NO HAY TIPO MOTIVO" si es así
				$data['TipoMotivoConsulta'] = isset($data['TipoMotivoConsulta']) ? $data['TipoMotivoConsulta'] : "NO HAY TIPO MOTIVO";

				
				// Creamos una nueva instancia del modelo y la guardamos en la base de datos
				$dataConsultasRealizada = new consultasRealizada($data);
				$dataConsultasRealizada->save();
				
				// Obtener el valor de codigo_tecnico enviado por el formulario
				$codigo_tecnico = $request->input('codigo_tecnico');

				// Obtener la fecha actual en formato 'YYYY-MM-DD'
				$fecha_actual = Carbon::now()->format('Y-m-d');

				// Buscar los registros correspondientes a la fecha actual y al código de técnico en la tabla consultas_realizadas
				$consultasRealizadas = consultasRealizada::where('codigo_tecnico', $codigo_tecnico)->where('created_at', 'like', $fecha_actual.'%')->get();

				// Pasar los registros a la vista
				$messageCodigo = "¡EXITO!";
				$messagesCodigo = "REGISTRO CONSULTA COMPLETADO";
				return view('llamadashome/consultas', ['consultasRealizadas' => $consultasRealizadas])
					->with('messageCodigo', $messageCodigo)
					->with('messagesCodigo', $messagesCodigo)
					->with('codigoUnico', $data['codigoUnico'])
					->with('page_title', 'Consultas - Registro')
					->with('navigation', 'Consultas');
				break;
	
			default:
				break;
		}
	
		// Redireccionamos a la página de inicio
		return redirect('/');
	}


	public function LeerDatos(Request $request) {
		// Obtener el valor de codigo_tecnico enviado por el formulario
		$codigo_tecnico = $request->input('codigo_tecnico');

		// Obtener la fecha actual en formato 'YYYY-MM-DD'
		$fecha_actual = Carbon::now()->format('Y-m-d');

		// Buscar los registros correspondientes a la fecha actual y al código de técnico en la tabla consultas_realizadas
		$consultasRealizadas = consultasRealizada::where('codigo_tecnico', $codigo_tecnico)->where('created_at', 'like', $fecha_actual.'%')->get();
		
		// Mostrar los registros encontrados en la vista
		return view('llamadashome/consultas', compact('consultasRealizadas'))
			->with('page_title', 'Consultas - Registro')
			->with('navigation', 'Consultas');
	}

	
	public function BuscarConsulta(Request $request) {
		// Obtener el valor de codigo_tecnico enviado por el formulario
		$codigo_tecnico = $request->input('codigo_tecnico');

		// Obtener la fecha actual en formato 'YYYY-MM-DD'
		$fecha_actual = Carbon::now()->format('Y-m-d');
	
		// Buscar los registros correspondientes a la fecha actual y al código de técnico en la tabla consultas_realizadas
		$consultasRealizadas = consultasRealizada::where('codigo_tecnico', $codigo_tecnico)->where('created_at', 'like', $fecha_actual.'%')->get();
	
		
		// Verificar si se ha enviado un valor en el formulario
		if (!isset($codigo_tecnico)) {
			// Si no se ha enviado un valor, mostrar la vista sin establecer el valor de $message
			return view('llamadashome/consultas', compact('consultasRealizadas'))
				->with('page_title', 'Consultas - Registro')
				->with('navigation', 'Consultas');
		}

		// CUANDO SE GUARDA EL REGISTRO
	
		// Obtener la fecha actual en formato 'YYYY-MM-DD'
		$fecha_actual = Carbon::now()->format('Y-m-d');
	
		// Buscar los registros correspondientes a la fecha actual y al código de técnico en la tabla consultas_realizadas
		$consultasRealizadas = consultasRealizada::where('codigo_tecnico', $codigo_tecnico)->where('created_at', 'like', $fecha_actual.'%')->get();
	
	
		if ($consultasRealizadas->isEmpty()) {
			$message = "Sin resultados";
			$messages = "No se encontraron consultas";
		} else {
			$message = "¡EXITO!";
			$messages = "CONSULTA ENCONTRADA";
			
		}

		// $data['codigoUnico'] = null;
		return view('llamadashome/consultas', compact('consultasRealizadas'))
			->with('message', $message)
			->with('messages', $messages)
			->with('codigoUnico', 'codigoUnico')
			->with('page_title', 'Consultas - Registro')
			->with('navigation', 'Consultas');
	}
	
	

	



}