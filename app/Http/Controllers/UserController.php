<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\authRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestion;
use App\Models\Rol;
use App\Models\User;
use App\Http\Requests\userRequest;

class UserController extends Controller
{

    public function auth(authRequest $request){

       if(Auth::attempt(request()->only('user','password'))){
        return redirect('home');
       }else{
        return back()->withErrors([
            'password' => 'Contraseña incorrecta',
        ])->onlyInput('user');
       }
      
    }   

    public function login(Request $request){
        return view('login');
    }

    public function home(Request $request){
        $gestiones=Gestion::orderBy('nombre','desc')->get();
        
        return view('homeUser',['gestiones'=>$gestiones]);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function index(){
        $usuarios=User::all();
        $roles=Rol::all();

        return view('usuarios',['usuarios'=>$usuarios,'roles'=>$roles]);
    }

    public function store(userRequest $request){
        $usuario = new User;

        $usuario->cod_sis=$request->cod_sis;
        $usuario->nombre=$request->nombre;
        $usuario->rol_id=$request->rol;
        $user= explode(" ",$request->nombre);
        $usuario->user=$user[0].'@docente.com';
        $usuario->password=bcrypt($request->cod_sis);
        
        $usuario->save();

        return redirect('usuarios');
    }

    public function destroy($id){
        $usuario=User::find($id);

        $usuario->delete();
        return redirect('usuarios');
    }
}
