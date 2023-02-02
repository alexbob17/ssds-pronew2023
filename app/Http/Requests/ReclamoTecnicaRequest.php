<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class ReclamoTecnicaRequest extends Request
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
    			'tipo_tecnico'		=> 'required',
    			'codigo_tecnico'	=> 'required',
    			'nombre_tecnico'	=> 'required',
    			'tecnologia'		=> 'required',
    			'id_producto'		=> 'required|regex:/^\d+$/i',
    			'id_solicitud'		=> 'required|regex:/^\d+$/i',
    			'lider_tecnica'		=> 'required',
    			'causa_reclamo'		=> 'required',
    			'observaciones'		=> 'required',
    	];
 
    	
    	return $input_rules;
    }
}
