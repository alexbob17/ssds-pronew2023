<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class InconsistenciaRequest extends Request
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
    			'no_incidente'			=> 'required|regex:/^\d+$/i',
    			'catalogo_auditoria'	=> 'required',
    			'tipo_servicio'			=> 'required',
    			'tipo_inconsistencia'	=> 'required',
    	];
    	
    	if($this->input('tipo_inconsistencia') == 'Otros') {
    		$input_rules['otra_inconsistencia'] = 'required';
    	}
    	
    	return $input_rules;
    }
}
