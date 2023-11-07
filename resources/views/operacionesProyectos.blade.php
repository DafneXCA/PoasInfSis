@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/tablasDetalle.css')}}">
@endsection
@section('body')
<div class="body-content">
    <div class="titulo"><strong>Operaciones y Proyectos</strong> <button>Añadir</button></div>
    <div class="content-div">
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>Objetivos</th>
                        <th>Indicadores</th>
                        @auth
                            
                        @endauth
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr >
                        <td>Objetivo 1</td>
                        <td>Indicador 1</td>
                        @auth
                            
                        @endauth
                        <td>
                            <a href=""><i class="bi bi-file-earmark-text"></i></a>
                            <a href=""><i class="bi bi-pen"></i></a>
                            <a href=""><i class="bi bi-trash"></i></a>
                        </td>
                </tr>
                <tr>
                        <td>Objetivo 2</td>
                        <td>Indicador 2</td>
                        <td>
                            <a href=""><i class="bi bi-file-earmark-text"></i></a>
                            <a href=""><i class="bi bi-pen"></i></a>
                            <a href=""><i class="bi bi-trash"></i></a>
                        </td>
                        
                </tr>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection