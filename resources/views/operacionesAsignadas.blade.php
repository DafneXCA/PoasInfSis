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
                        <th>Gestión</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user->proyectos as $proyecto)
                        <tr >
                            <td>{{$proyecto->objetivo}}</td>
                            <td>{{$proyecto->objetivoE->objetivoG->gestion->nombre}}</td>
                            <td>{{$proyecto->estado}}</td>
                            <td>

                                <a href="{{route('detalleOperacion',['id'=>$proyecto->id])}}"><i class="bi bi-file-earmark-text" title="detalle"></i></a>
                                <a onclick="CompletarId({{$proyecto->id}})" data-bs-toggle="modal" data-bs-target="#editar" id="edit"><i class="bi bi-pen" title="editar"></i></a>
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-------modal editar-------------->
<div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Editar Operacion o Proyecto</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('cambioEstado')}}" method="POST" id="formEdit">
                @csrf

                <input type="hidden" name="id" id='id' value="{{old('id')}}">

                <div>
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="select" onchange="cambiar()">
     
                        <option value="No iniciado">No iniciado</option>          
                           
                        <option value="En progreso" @if(old('estado') == "En progreso")
                                    selected
                        @endif>En progreso</option>

                        <option value="Finalizado" >Finalizado</option>
                    
                    </select>
                </div>

                <div id="porcentaje" style="display: none">
                    <label for="porcentaje-input">Porcentaje</label>
                    <input type="number" name="porcentaje" id="porcentaje-input" class="input" value="{{old('porcentaje')}}"  >
                    @error('porcentaje')
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

  @error('porcentaje')
    <script>
        var button=document.getElementById("edit");
        button.click();
        var divPorcentaje=document.getElementById('porcentaje');
        divPorcentaje.style.display="block";
    </script>
  @enderror

  <script>
    var inputId=document.getElementById('id');
    function CompletarId(id){
        inputId.value=id;
    }

    var divPorcentaje=document.getElementById('porcentaje');
   function cambiar(){
        var select=document.getElementById('estado');
        if(select.value=="En progreso"){
            divPorcentaje.style.display="block";
        }else{
            divPorcentaje.style.display="none";
        }
    }
  </script>


@endsection