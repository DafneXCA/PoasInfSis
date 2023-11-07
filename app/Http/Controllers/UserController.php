<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
    }

    public function login(Request $request){
        return view('login');
    }

    public function home(Request $request){
        return view('homeUser');
    }
}
