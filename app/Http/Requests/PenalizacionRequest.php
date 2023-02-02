<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class PenalizacionRequest extends Request
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
    			'fecha_reporte'	=> 'required|date',
    			'nivel'			=> 'required',
    			'nombre_agente'	=> 'required',
    			'catalogo_auditoria' => 'required',
    			'aplicativo'	=> 'required',
    			'clasificacion_gestion' => 'required', 
    			'mal_proceso'	=> 'required',
    			'observaciones' => 'required',
        	];
    	
    	if($this->input('aplicativo') != 'DESEMPEÑO ADMON') {
    		$input_rules['tecnologia'] = 'required';
    		$input_rules['no_solicitud'] = 'required|numeric';
    	}
    	
    	return $input_rules;
    }
}
