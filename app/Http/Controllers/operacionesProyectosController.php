<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjEspecificos;
use App\Models\OpProyectos;
use App\Models\User;
use App\Http\Requests\objetivoRequest;
use App\Http\Requests\objetivoEditRequest;
use App\Http\Requests\estadoRequest;

class operacionesProyectosController extends Controller
{
    public function index($id){
        $objEspecifico=ObjEspecificos::find($id);
        $docentes=User::all();

        return view('operacionesProyectos',['objEspecifico'=>$objEspecifico,'docentes'=>$docentes]);
    }

    public function store(objetivoRequest $request){
        $opProyecto=new OpProyectos;
        
        $opProyecto->objetivo=$request->objetivo;
        $opProyecto->indicador=$request->indicador;
        $opProyecto->obj_especifico_id=$request->obj_especifico;

        $opProyecto->save();
        
        return redirect(route('operacionesProyectos',['id'=>$request->obj_especifico]));
    }

    public function update(objetivoEditRequest $request){
        $opProyectoE=OpProyectos::find($request->id);

        $opProyectoE->objetivo=$request->objetivoE;
        $opProyectoE->indicador=$request->indicadorE;

        $opProyectoE->save();

        return redirect(route('operacionesProyectos',['id'=>$opProyectoE->obj_especifico_id]));
    }

    public function destroy($id){
        $opProyecto=OpProyectos::find($id);

        $obj_especifico_id= $opProyecto->obj_especifico_id;
        $opProyecto->delete();

        return redirect(route('operacionesProyectos',['id'=>$obj_especifico_id]));
    }

    public function asignar(Request $request){
        $opProyecto=OpProyectos::find($request->idOperacion);

        $opProyecto->user_id=$request->docente;
        $opProyecto->save();

        return redirect(route('operacionesProyectos',['id'=>$opProyecto->obj_especifico_id]));
    }

    public function operacionesAsignadas($id){
        $user=User::find($id);

        return view('operacionesAsignadas',['user'=>$user]);
    }

    public function cambiarEstado(estadoRequest $request){
        $opProyecto=OpProyectos::find($request->id);
        
        if ($request->estado=="En progreso") {
            $opProyecto->estado= "En progreso ".$request->porcentaje.'%';
        } else {
            $opProyecto->estado=$request->estado;
        }

        $opProyecto->save();        
        
        return view('operacionesAsignadas');

    }
}
