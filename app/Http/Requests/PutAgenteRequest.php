<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class PutAgenteRequest extends Request
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
    	return [
        	'nivel'	=> 'required|max:255',
        	'nombre'=> 'required|max:255',
    	];
     }
}
