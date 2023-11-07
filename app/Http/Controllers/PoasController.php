<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoasController extends Controller
{
    public function objetivosGestion(Request $request){
        return view('objetivosGestion');
    }

    public function objetivosEspecificos(Request $request){
        return view('objetivosEspecificos');
    }

    public function operacionesProyectos(Request $request){
        return view('operacionesProyectos');
    }

    public function operacionesAsignadas(Request $request){
        return view('operacionesAsignadas');
    }

    public function detalleOperacion(Request $request){
        return view('detalleOperacion');
    }

}
