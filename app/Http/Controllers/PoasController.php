<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivos;
use Illuminate\Support\Facades\Storage;

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

    public function archivos(Request $request){
        $archivo=$request->file('document');
        $ruta=Storage::url($request->file('document')->storeAs('public',$archivo->getClientOriginalName()));

        $file=new Archivos;
        $file->nombre=$archivo->getClientOriginalName();
        $file->ruta=$ruta;
        $file->tipo="archivo";
        $file->trimestre=1;
        $file->op_proyectos_id=1;
        $file->save();

    }
}
