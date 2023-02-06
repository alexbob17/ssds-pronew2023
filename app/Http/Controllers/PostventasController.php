<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class PostventasController extends Controller
{
    public function showGpon()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslado Adicion - Saturado' ]
	];	
	
			return view('postventas/adicion')
			->with('page_title', 'PostVenta - Adicion')
			->with('navigation', 'PostVenta');
	}
}