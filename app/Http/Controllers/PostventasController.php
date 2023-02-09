<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class PostventasController extends Controller
{
    public function showRegistro()
	{		
		$breadcrumb = [
			['name' => 'PostVenta - Saturado' ]
	];	
	
			return view('postventas/registro')
			->with('page_title', 'PostVenta - Registro')
			->with('navigation', 'PostVenta');
	}
}