@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/tablasDetalle.css')}}">
@endsection
@section('body')
<div class="body-content">
    <div class="titulo"><strong>Gestiones</strong><button class="button-añadir" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="añadir">Añadir</button></div>
    <div class="content-div">
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>Gestión</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gestiones as $gestion)
                    <tr >
                        <td> {{$gestion->nombre}}</td>
                        <td>
                            <a onclick="CompletarId({{$gestion->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash"></i></a>
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
          <h1 class="modal-title fs-5 " ><strong>Agregar gestión</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('gestiones-store')}}" method="POST" id="form">
                @csrf
                <div>
                    <label for="gestion">Gestión</label>
                    <input type="number" name="gestion" id="gestion" class="input">
                    @error('gestion')
                        <span class="error" > {{ $message }}</span>
                    @enderror
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
          <h1 class="modal-title fs-5 " ><strong>Eliminar gestión</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            ¿Estas seguro de eliminar la gestión?
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" data-bs-dismiss="modal"><a  id="eliminar-a">Eliminar</a></button>
          <button type="button" class=" cancel" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  @error('gestion')
    <script>
        button=document.getElementById("añadir");
        button.click();
    </script>
  @enderror

  <script>

    function CompletarId(id){

        var eliminar=document.getElementById("eliminar-a");

        var route="{{route('gestiones-destroy',['id'=>""])}}";
        route=route+"/"+id;
        eliminar.href=route;
    }
    
  </script>
@endsection