<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\authRequest;
use Illuminate\Support\Facades\Auth;

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
       return view('homeUser');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
