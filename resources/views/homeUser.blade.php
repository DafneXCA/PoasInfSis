@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/homeUser.css')}}">
@endsection
@section('body')


<div class="content-home-user">
    <div class="content-1">
        <span><strong>GESTIONES</strong></span>

        <div class="gestiones">
        <button class="gestion">
            Gestión 2023
        </button>

        <button class="gestion">
            Gestión 2022
        </button>

        <button class="gestion">
            Gestión 2021
        </button>
        </div>

    </div>
    <div class="content-2">
        <img src="{{asset('images/undraw.png')}}" class="image">
        <div class="texto">
           <strong>Repositorio para el control y gestión de documentos respaldatorios para los POAS</strong> 
        </div>
    </div> 
</div>

@endsection