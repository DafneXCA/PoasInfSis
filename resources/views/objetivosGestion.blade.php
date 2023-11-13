@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/tablasDetalle.css')}}">
@endsection
@section('body')
<div class="body-content">
    <div class="titulo"><strong>Objetivos de gestión {{$gestion->nombre}}</strong> <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="button-añadir" id="añadir">Añadir</button></div>
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

                    @foreach ($gestion->objetivosG as $objetivoG)
                        <tr >
                            <td>{{$objetivoG->objetivo}}</td>
                            <td>{{$objetivoG->indicador}}</td>
                            
                            <td>
                                <a href="{{route('objetivosEspecificos',['id'=>$objetivoG->id])}}"><i class="bi bi-file-earmark-text" title="objetivos especificos"></i></a>
                                <a onclick="editar('{{$objetivoG->id}}','{{$objetivoG->objetivo}}','{{$objetivoG->indicador}}')" data-bs-toggle="modal" data-bs-target="#editar" id="edit"><i class="bi bi-pen" title="editar"></i></a>
                                <a onclick="CompletarId({{$objetivoG->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<!---modal añadir-->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Agregar Objetivo de Gestión</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('objetivosGestion-store')}}" method="POST" id="form">
                @csrf

                <input type="hidden" name="gestion" value="{{$gestion->id}}">

                <div>
                    <label for="objetivo">Objetivo</label>
                    <input type="text" name="objetivo" id="objetivo" class="input" value="{{old('objetivo')}}">
                    @error('objetivo')
                        <span class="error" > {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="indicador">Indicador</label>
                    <input type="text" name="indicador" id="indicador" class="input" value="{{old('indicador')}}">
                    @error('indicador')
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

  <!-----modal editar--->

  <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Editar Objetivo de Gestión</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('objetivosGestion-update')}}" method="POST" id="formEdit">
                @csrf

                <input type="hidden" name="id" id='id' value="{{old('id')}}">

                <div>
                    <label for="objetivoE">Objetivo</label>
                    <input type="text" name="objetivoE" id="objetivoE" class="input" value="{{old('objetivoE')}}">
                    @error('objetivoE')
                        <span class="error" > {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="indicadorE">Indicador</label>
                    <input type="text" name="indicadorE" id="indicadorE" class="input" value="{{old('indicadorE')}}">
                    @error('indicadorE')
                        <span class="error" > {{ $message }}</span>
                    @enderror
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" form="formEdit">Guardar</button>
          <button type="button" class=" cancel" onclick="cancelar()" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

<!----modal eliminar---->

  <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Eliminar Objetivo de Gestión</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            ¿Estas seguro de eliminar el objetivo de gestión?
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" data-bs-dismiss="modal"><a  id="eliminar-a">Eliminar</a></button>
          <button type="button" class=" cancel" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  @if ($errors->has('objetivo') || $errors->has('indicador'))
    <script>
        button=document.getElementById("añadir");
        button.click();
    </script>   
  @endif

  @if ($errors->has('objetivoE') || $errors->has('indicadorE'))
  <script>
      button=document.getElementById("edit");
      button.click();
  </script>   
  @endif

  <script>

    //editar
    var inputObjetivo=document.getElementById('objetivoE');
    var inputIndicador=document.getElementById('indicadorE');
    var inputId=document.getElementById('id');
    function editar(id,objetivo,indicador){
        inputId.value=id;
        inputObjetivo.value=objetivo;
        inputIndicador.value=indicador;
    }

    //eliminar
     function CompletarId(id){

        var eliminar=document.getElementById("eliminar-a");

        var route="{{route('objetivosGestion-destroy',['id'=>""])}}";
        route=route+"/"+id;
        eliminar.href=route;
    }
  </script>

@endsection