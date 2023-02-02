<?php

namespace SSD\Http\Requests;

use SSD\Http\Requests\Request;

class UsuarioRequest extends Request
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
    		'username'				=> 'required|max:255|unique:users',
        	'first_name'			=> 'required|max:255',
        	'last_name'				=> 'required|max:255',
        	'email' 				=> 'required|email|max:255|unique:users',
    		'organizational_area' 	=> 'required|max:255',
    		'role'					=> 'required',
    		'password' 				=> 'required|min:6|confirmed',
    		'password_confirmation'	=> 'required'	 
    	];
     }
}
