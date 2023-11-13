<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;
use App\Http\Requests\gestionRequest;

class gestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestiones=Gestion::all();

        return view('gestiones',['gestiones'=>$gestiones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(gestionRequest $request)
    {
        $gestion=new Gestion;
        $gestion->nombre=$request->gestion;
        $gestion->activo=0;
        $gestion->save();

        return redirect('gestiones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gestion=Gestion::find($id);
        $gestion->delete();

        return redirect('gestiones');
    }
}
