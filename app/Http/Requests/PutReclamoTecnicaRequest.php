<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class PutReclamoTecnicaRequest extends Request
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
    	$rules = [
        	'resolucion_tecnica' => 'required|max:255',
    	];

    	 
    	return $rules;
     }
}
