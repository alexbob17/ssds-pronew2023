<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class RegistroController extends Controller


{
    public function showRegistro(Request $request)
    {       
        $breadcrumb = [
            ['name' => 'Llamadas - Saturado' ]
        ];        
            
       
        
        return view('llamadashome/registro')
            ->with('page_title', 'Llamadas - Servicio')
            ->with('navigation', 'Llamadas');
            
    }
    
   
   

}