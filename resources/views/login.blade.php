@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('body')

<div class="content">
    <div class='login'>

        <h5><strong>Iniciar sesión</strong></h5>

        <form action="{{route('auth')}}" method="POST">
            @csrf
        <div class="input">
        <label for="user"><strong>Usuario</strong></label>
        <input type="text" id="user" name="user" value="{{old('user')}}">
        @error('user')
            <span class="error" > {{ $message }}</span><br> 
        @enderror
        </div>
    
        <div class="input">
        <label for="password"><strong>Contraseña</strong></label>
        <input type="password" id="password" name="password">
        @error('password')
            <span class="error"> {{ $message }}</span><br> 
        @enderror
        </div>

        <div class="button">
            <button>Ingresar</button>
        </div>
        </form>
    </div>
</div>

@endsection
