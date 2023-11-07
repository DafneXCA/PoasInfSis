@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('body')

<div class="content">
    <div class='login'>

        <h5><strong>Iniciar sesión</strong></h5>
    
        <form action="">
        <div class="input">
        <label for="user"><strong>Usuario</strong></label>
        <input type="text" id="user">
        </div>
    
        <div class="input">
        <label for="password"><strong>Contraseña</strong></label>
        <input type="text">
        </div>

        <div class="button">
            <button><strong>Ingresar</strong></button>
        </div>
        </form>
    </div>
</div>

@endsection
