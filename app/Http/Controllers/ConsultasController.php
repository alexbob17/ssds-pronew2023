<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class ConsultasController extends Controller
{
    //
    public function showGpon()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslado GPON - Saturado' ]
	];	
	
			return view('postventastraslados/gpon')
			->with('page_title', 'PostVenta Traslado - GPON')
			->with('navigation', 'PostVenta Traslado');
	}
}