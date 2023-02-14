<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

class DatosController extends Controller
{
    public function postForm1(Request $request)
{
    $codigo_tecnico = $request->input('codigo_tecnico');
    $telefono = $request->input('telefono');
    $tecnico = $request->input('tecnico');
    $motivo_llamada = $request->input('motivo_llamada');
    
    session(['codigo_tecnico' => $codigo_tecnico]);
    session(['telefono' => $telefono]);
    session(['tecnico' => $tecnico]);
    session(['motivo_llamada' => $motivo_llamada]);

    return redirect('/instalacion');
}

public function getForm2()
{
    $codigo_tecnico = session('codigo_tecnico');
    $telefono = session('telefono');
    $tecnico = session('tecnico');
    $motivo_llamada = session('motivo_llamada');
    
    return view('instalacion', [
        'codigo_tecnico' => $codigo_tecnico,
        'telefono' => $telefono,
        'tecnico' => $tecnico,
        'motivo_llamada' => $motivo_llamada
    ]);
}


}