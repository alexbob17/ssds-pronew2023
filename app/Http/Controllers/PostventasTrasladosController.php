<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class PostventasTrasladosController extends Controller
{
    public function showGpon()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslado GPON - Saturado' ]
	];	
	
			return view('postventastraslados/gpon')
			->with('page_title', 'PostVenta Traslado - GPON')
			->with('navigation', 'PostVenta Traslado');
	}
    public function showHfc()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslados- Saturado' ]
	];	
	
			return view('postventastraslados/hfc')
			->with('page_title', 'PostVentas Traslados - HFC')
			->with('navigation', 'Postventa Traslado');
	}

    public function showAdsl()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslado ADSL - Saturado' ]
	];	
	
			return view('postventastraslados/adsl')
			->with('page_title', 'PostVenta Traslados - ADSL')
			->with('navigation', 'PostVenta Traslados');
	}
    public function showCobre()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslado Cobre - Saturado' ]
	];	
	
			return view('postventastraslados/cobre')
			->with('page_title', 'PostVenta Traslado - Cobre')
			->with('navigation', 'PostVenta Traslados');
	}

    public function showDth()
	{		
		$breadcrumb = [
			['name' => 'PostVenta Traslado DTH - Saturado' ]
	];	
	
			return view('postventastraslados/dth')
			->with('page_title', 'PostVenta Traslado - DTH')
			->with('navigation', 'PostVenta Traslados');
	}
}