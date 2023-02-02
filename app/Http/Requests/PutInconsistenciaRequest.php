<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class PutInconsistenciaRequest extends Request
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
    			'resolucion'	=> 'required',
    			'accion'		=> 'required',
    	];
    	
    	if($this->input('resolucion') == 'INCORRECTO') {
    		$input_rules['observaciones'] = 'required';
    	}
    	
    	return $input_rules;
    }
}
