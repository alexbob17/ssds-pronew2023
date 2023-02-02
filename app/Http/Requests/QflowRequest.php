<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class QflowRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	
	
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
    	$input_rules = [
    			'no_caso_qflow'			=> 'required|regex:/^\d+$/i',
    			'fecha_registro'		=> 'required|date',
    			'fecha_recibido'		=> 'required|date',
				'asesor'				=> 'required',
    			'id_tienda'				=> 'required',
    			'tipo_servicio'			=> 'required',
    			'no_producto'			=> 'required|regex:/^\d+$/i',
    			'no_dano_solicitud'		=> 'required|regex:/^\d+$/i',
    			'tipologia'				=> 'required',
    			'workflow'				=> 'required',
    			'medio_ingreso'			=> 'required',
    			'tipo_caso'				=> 'required',
    			'observaciones'			=> 'required',
    	];
    	
    	return $input_rules;
    }
}
