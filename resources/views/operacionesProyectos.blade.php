@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/tablasDetalle.css')}}">
@endsection
@section('body')
<div class="body-content">
    <div class="titulo"><strong>Operaciones y Proyectos</strong> <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="button-añadir" id="añadir">Añadir</button></div>
    <div class="content-div">
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>Operaciones o Proyectos</th>
                        <th>Indicadores</th>
                        @auth
                            
                        @endauth
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objEspecifico->operaciones as $operacion)
                        <tr >
                            <td>{{$operacion->objetivo}}</td>
                            <td>{{$operacion->indicador}}</td>
                            @auth
                                
                            @endauth
                            <td>                                
                                <a onclick="asignar({{$operacion->id}})" data-bs-toggle="modal" data-bs-target="#asignar"><i class="bi bi-clipboard-check" title="asignar"></i></a>
                                <a onclick="editar({{$operacion->id}},'{{$operacion->objetivo}}','{{$operacion->indicador}}')" data-bs-toggle="modal" data-bs-target="#editar" id="edit"><i class="bi bi-pen" title="editar"></i></a>
                                <a onclick="CompletarId({{$operacion->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
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
          <h1 class="modal-title fs-5 " ><strong>Agregar Operacion o Proyecto</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('operacionesProyectos-store')}}" method="POST" id="form">
                @csrf

                <input type="hidden" name="obj_especifico" value="{{$objEspecifico->id}}">

                <div>
                    <label for="objetivo">Operacion o Proyecto</label>
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
          <h1 class="modal-title fs-5 " ><strong>Editar Operacion o Proyecto</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('operacionesProyectos-update')}}" method="POST" id="formEdit">
                @csrf

                <input type="hidden" name="id" id='id' value="{{old('id')}}">

                <div>
                    <label for="objetivoE">Operacion o Proyecto</label>
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
          <h1 class="modal-title fs-5 " ><strong>Eliminar Operacion o Proyecto</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            ¿Estas seguro de eliminar la operacion o proyecto del objetivo especifico?
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" data-bs-dismiss="modal"><a  id="eliminar-a">Eliminar</a></button>
          <button type="button" class=" cancel" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

<!-----modal asignar--->

  <div class="modal fade" id="asignar" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Asignar Operacion o Proyecto</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('operacionesProyectos-asignar')}}" method="POST" id="formAsignar">
                @csrf

                <input type="hidden" name="idOperacion" id='idOperacion' value="{{old('idOperacion')}}">

                <div>
                    <label for="objetivoE">Docente</label>

                    <select name="docente" id="docente" class="select">
                      @foreach ($docentes as $docente)
                          
                              <option value="{{$docente->id}}" @if(old('docente') == $docente->id)
                                  selected
                              @endif>{{$docente->nombre}}</option>
                         
                      @endforeach
                  </select>
                    
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" form="formAsignar">Guardar</button>
          <button type="button" class=" cancel" onclick="cancelar()" data-bs-dismiss="modal">Cancelar</button>
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

        var route="{{route('operacionesProyectos-destroy',['id'=>""])}}";
        route=route+"/"+id;
        eliminar.href=route;
    }

    var inputIdDocente=document.getElementById('idOperacion'); 
    function asignar(id){
      inputIdDocente.value=id;
    }
  </script>

@endsection