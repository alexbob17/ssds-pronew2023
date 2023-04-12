<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;

use SSD\Models\agendamientosRealizados;

class AgendamientosController extends Controller
{
    public function storeAgendamientos(Request $request)
	{		
		$motivo_llamada = $request->input('motivo_llamada');
	
		switch ($motivo_llamada) {
			case 'AGENDAMIENTOS':
				$selectedFields = [
					'codigo_tecnico',
                    'telefono',
                    'tecnico',
                    'motivo_llamada',
                    'Agendamiento',
                    'TipoAgendamiento',
                    'fecha_registro',
                    'hora_registro',
                    'N_Orden',
                    'Observaciones',
                    'Recibe',
                    'username_creacion',
                    'username_atencion',
				];
	
				$data = $request->only($selectedFields);

                // Agregamos el usuario actual como creador y atendedor del registro
                $data['username_creacion'] = Auth::user()->username;
                $data['username_atencion'] = Auth::user()->username;

                // Formateamos la hora para incluir AM / PM
                $hora_registro = $data['hora_registro'];
                $hora_registro_am_pm = date('h:i a', strtotime($hora_registro));
                $data['hora_registro'] = $hora_registro_am_pm;

                // Creamos una nueva instancia del modelo y la guardamos en la base de datos
                $dataAgendamientoRealizada = new agendamientosRealizados($data);
                $dataAgendamientoRealizada->save();
	
				$message = "¡EXITO!";
				$messages = "REGISTRO AGENDAMIENTO COMPLETADO";
	
				return view('llamadashome/agendamientos')
					->with('message', $message)
					->with('messages', $messages)
					->with('page_title', 'Agendamientos - Registro')
					->with('navigation', 'Agendamientos');
	
				break;
	
			default:
				break;
		}
	
		// Redireccionamos a la página de inicio
		return redirect('/');
	}
}