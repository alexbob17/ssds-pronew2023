<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class NodoSaturadoRequest extends Request
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
    			'nombre_cliente'		=> 'required',
    			'no_contrato'			=> 'required|regex:/^\d+$/i',
    			'ubicacion_geografica'	=> 'required',
    			'barrio'				=> 'required',
    			'direccion'				=> 'required',
    			'fecha_registro_dano'	=> 'required|date',
    			'codigo_dano'			=> 'required|regex:/^\d+$/i',
    			'nodo_saturado'			=> 'required',
    			'nomenclatura_nodo'		=> 'required',
    			'fecha_fin_afectacion'	=> 'date',
    			'estado_gestion'		=> 'required',
    	];
    	
    	if(!($this->input('estado_gestion') == 'Orden para Trómite de Cambio Tecnología' || 
    		$this->input('estado_gestion') == 'Para Gestión de Trámite') && 
    		$this->input('estado_gestion') != '') { 		
    		$input_rules['fecha_fin_afectacion'] .= '|required';
    		$input_rules['comentarios'] = 'required';
    	}
    	
    	return $input_rules;
    }
}
