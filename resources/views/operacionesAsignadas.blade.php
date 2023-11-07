@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/tablasDetalle.css')}}">
@endsection
@section('body')
<div class="body-content">
    <div class="tituloSB text-center"><strong>Operaciones y Proyectos asignados</strong> </div>
    <div class="content-div">
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>Operación o proyecto</th>
                        <th>Indicador</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                <tr >
                        <td>Objetivo 1</td>
                        <td>Indicador 1</td>
                        <td>En progreso 50%</td>
                        <td><a href=""><i class="bi bi-pen"></i></a></td>
                </tr>
                <tr>
                        <td>Objetivo 2</td>
                        <td>Indicador 2</td>
                        <td>No iniciado</td>
                        <td><a href=""><i class="bi bi-pen"></i></a></td>
                        
                </tr>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection