<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivos;
use App\Models\OpProyectos;
use Illuminate\Support\Facades\Storage;

class PoasController extends Controller
{
    public function detalleOperacion($id){
        $proyecto=OpProyectos::find($id);

        return view('detalleOperacion',['proyecto'=>$proyecto]);
    }

    public function archivos(Request $request){
        
        $archivo=$request->file('document');
        $ruta=Storage::url($request->file('document')->storeAs('public',$archivo->getClientOriginalName()));

        $file=new Archivos;
        $file->nombre=$archivo->getClientOriginalName();
        $file->ruta=$ruta;
        $file->tipo=$request->tipo;
        $file->trimestre=$request->trimestre;
        $file->op_proyectos_id=$request->id_proyecto;
        $file->save();
       
    }

    public function destroy($id){
        $archivo=Archivos::find($id);

        $id=$archivo->op_proyectos_id;
        $archivo->delete();

        return redirect(route('detalleOperacion',['id'=>$id]));
    }   
    
}
