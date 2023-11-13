@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/homeUser.css')}}">
@endsection
@section('body')


<div class="content-home-user">
    <div class="content-1">
        <span><strong>GESTIONES</strong></span>
        <div class="gestiones">
            @foreach ($gestiones as $gestion)
                
                    <a href="{{route('objetivosGestion',['id'=>$gestion->id])}}" class="gestion">
                        Gestión {{$gestion->nombre}}
                    </a>
                
            @endforeach
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