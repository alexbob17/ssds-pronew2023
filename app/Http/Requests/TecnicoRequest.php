<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class TecnicoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo_tecnico' => 'required|unique:tecnicos,CODIGO',
            'tecnico' => 'required',
            'telefono' => 'required'
        ];
    }
    
}