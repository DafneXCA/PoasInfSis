<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\objetivoRequest;
use App\Http\Requests\objetivoEditRequest;
use App\Models\Gestion;
use App\Models\ObjGestion;

class objetivosGestionController extends Controller
{
    public function index($id){
        $gestion=Gestion::find($id);

        return view('objetivosGestion',['gestion'=>$gestion]);
    }

    public function store(objetivoRequest $request){
        $objetivoG=new ObjGestion;
        
        $objetivoG->objetivo=$request->objetivo;
        $objetivoG->indicador=$request->indicador;
        $objetivoG->gestion_id=$request->gestion;

        $objetivoG->save();
        
        return redirect(route('objetivosGestion',['id'=>$request->gestion]));
    }

    public function update(objetivoEditRequest $request){

        $objetivoG=ObjGestion::find($request->id);

        $objetivoG->objetivo=$request->objetivoE;
        $objetivoG->indicador=$request->indicadorE;

        $objetivoG->save();

        return redirect(route('objetivosGestion',['id'=>$objetivoG->gestion_id]));
    }

    public function destroy($id){
        $objetivoG=ObjGestion::find($id);

        $id=$objetivoG->gestion_id;
        $objetivoG->delete();

        return redirect(route('objetivosGestion',['id'=>$id]));
    }
}
