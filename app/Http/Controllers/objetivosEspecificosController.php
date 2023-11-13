<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjGestion;
use App\Models\ObjEspecificos;
use App\Http\Requests\objetivoRequest;
use App\Http\Requests\objetivoEditRequest;

class objetivosEspecificosController extends Controller
{
    public function index($id){
        $objGestion=ObjGestion::find($id);

        return view('objetivosEspecificos',['objGestion'=>$objGestion]);
    }

    public function store(objetivoRequest $request){
        $objetivoE=new ObjEspecificos;
        
        $objetivoE->objetivo=$request->objetivo;
        $objetivoE->indicador=$request->indicador;
        $objetivoE->obj_gestion_id=$request->obj_gestion;

        $objetivoE->save();
        
        return redirect(route('objetivosEspecificos',['id'=>$request->obj_gestion]));
    }

    public function update(objetivoEditRequest $request){
        $objetivoE=ObjEspecificos::find($request->id);

        $objetivoE->objetivo=$request->objetivoE;
        $objetivoE->indicador=$request->indicadorE;

        $objetivoE->save();

        return redirect(route('objetivosEspecificos',['id'=>$objetivoE->obj_gestion_id]));
    }

    public function destroy($id){
        $objetivoE=ObjEspecificos::find($id);

        $obj_gestion_id= $objetivoE->obj_gestion_id;
        $objetivoE->delete();

        return redirect(route('objetivosEspecificos',['id'=>$obj_gestion_id]));
    }
}
