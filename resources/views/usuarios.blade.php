@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/tablasDetalle.css')}}">
@endsection
@section('body')
<div class="body-content">
    <div class="titulo"><strong>Usuarios</strong><button class="button-añadir" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="añadir">Añadir</button></div>
    <div class="content-div">
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr >
                        <td> {{$usuario->nombre}}</td>
                        <td>
                            @if($usuario->rol->nombre!="administrador")
                                
                              <a href="{{route('operacionesAsignadas',['id'=>$usuario->id])}}" ><i class="bi bi-card-checklist" title="operaciones y proyectos"></i></a>
                              <a onclick="CompletarId({{$usuario->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    
                            @endif
                        </td>
                </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Agregar usuario</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('usuarios-store')}}" method="POST" id="form">
                @csrf
                <div>
                    <label for="cod_sis">Código Sis</label>
                    <input type="number" name="cod_sis" id="cod_sis" class="input" value="{{old('cod_sis')}}">
                    @error('cod_sis')
                        <span class="error" > {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="input" value="{{old('nombre')}}">
                    @error('nombre')
                        <span class="error" > {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="rol">Rol</label>

                    <select name="rol" id="rol" class="select">
                        @foreach ($roles as $rol)
                            @if($rol->nombre!="administrador")
                                <option value="{{$rol->id}}" @if(old('rol') == $rol->id)
                                    selected
                                @endif>{{$rol->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" form="form">Guardar</button>
          <button type="button" class=" cancel" onclick="cancelar()" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Eliminar usuario</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            ¿Estas seguro de eliminar el usuario?
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" data-bs-dismiss="modal"><a  id="eliminar-a">Eliminar</a></button>
          <button type="button" class=" cancel" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  @if($errors->has('cod_sis') || $errors->has('nombre'))
    <script>
        button=document.getElementById("añadir");
        button.click();
    </script>
  @endif

  <script>

    function CompletarId(id){

        var eliminar=document.getElementById("eliminar-a");

        var route="{{route('usuarios-destroy',['id'=>""])}}";
        route=route+"/"+id;
        eliminar.href=route;
    }
    
  </script>
@endsection