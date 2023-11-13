@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/detalleOperacion.css')}}">
@endsection
@section('body')
<div class="body-content">
    
    <div class="box-content">
        <div class="title"><strong>{{$proyecto->objetivo }}</strong><br>{{$proyecto->estado}}</div>
        <div class="detail-content">
            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 1</strong></div>
                <div class="content-detail">
                    <div class="content-archive">
                        <div class="encabezado">
                            <span><i class="bi bi-archive"></i>Archivos respaldatorios</span>
                            <div class="button"><button onclick="completar('archivo',1)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>    
                        </div>
                        
                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==1 && $archivo->tipo=='archivo')
                                    <div class=fila>
                                        <div class="columna_1">
                                            <span>{{$archivo->nombre}}</span>
                                        </div>
                                        <div class="columna_2">
                                            <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                            <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                        </div>
                                    </div>
                                @endif 
                            @endforeach
                        </div>   
                    </div>
                    
                    <div class="content-form">
                        
                        <div class="encabezado">
                            <span><i class="bi bi-file-earmark-text"></i>Formularios</span>
                            <div class="button"><button onclick="completar('formulario',1)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>    
                        </div>

                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==1 && $archivo->tipo=='formulario')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div> 
                                @endif 
                            @endforeach
                        </div>   
                        
                    </div> 
                </div>
            </div>

            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 2</strong></div>
                <div class="content-detail">
                    <div class="content-archive">

                        <div class="encabezado">
                            <span><i class="bi bi-archive"></i>Archivos respaldatorios</span>
                            <div class="button"><button onclick="completar('archivo',2)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>    
                        </div>

                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==2 && $archivo->tipo=='archivo')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div>  
                                @endif 
                            @endforeach
                        </div>            
                        
                    </div>
                    <div class="content-form">
                        <div class="encabezado">
                            <span><i class="bi bi-file-earmark-text"></i>Formularios</span>
                            <div class="button"><button onclick="completar('formulario',2)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>
                        </div>
                        
                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==2 && $archivo->tipo=='formulario')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div> 
                                @endif 
                            @endforeach
                        </div> 

                    </div> 
                </div>
            </div>

            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 3</strong></div>
                <div class="content-detail">
                    
                    <div class="content-archive">

                        <div class="encabezado">
                            <span><i class="bi bi-archive"></i>Archivos respaldatorios</span>
                            <div class="button"><button onclick="completar('archivo',3)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>    
                        </div>

                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==3 && $archivo->tipo=='archivo')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div> 
                                @endif 
                            @endforeach
                        </div>            
                        
                    </div>
                    
                    <div class="content-form">
                        <div class="encabezado">
                            <span><i class="bi bi-file-earmark-text"></i>Formularios</span>
                            <div class="button"><button onclick="completar('formulario',3)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>
                        </div>

                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==3 && $archivo->tipo=='formulario')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div>  
                                @endif 
                            @endforeach
                        </div> 
                        
                    </div> 
                    </div>
            </div>

            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 4</strong></div>
                <div class="content-detail">
                   
                    <div class="content-archive">

                        <div class="encabezado">
                            <span><i class="bi bi-archive"></i>Archivos respaldatorios</span>
                            <div class="button"><button onclick="completar('archivo',4)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>    
                        </div>

                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==4 && $archivo->tipo=='archivo')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div>
                                @endif 
                            @endforeach
                        </div>            
                        
                    </div>
                   
                    <div class="content-form">
                        <div class="encabezado">
                            <span><i class="bi bi-file-earmark-text"></i>Formularios</span>
                            <div class="button"><button onclick="completar('formulario',4)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div>
                        </div>
                        
                        <div class="archivos">
                            @foreach ($proyecto->archivos as $archivo)
                                @if($archivo->trimestre==4 && $archivo->tipo=='formulario')
                                <div class=fila>
                                    <div class="columna_1">
                                        <span>{{$archivo->nombre}}</span>
                                    </div>
                                    <div class="columna_2">
                                        <a href="{{asset($archivo->ruta)}}"><i class="bi bi-eye"></i></a>
                                        <a onclick="CompletarId({{$archivo->id}})" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash" title="eliminar"></i></a>
                                    </div>
                                </div> 
                                @endif 
                            @endforeach
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>

<!------------modal añadir------------->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <h1 class="modal-title fs-5 " ><strong>Agregar Archivos</strong></h1>
              <button class="btn-close" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('registro_archivos')}}" method="POST" id="form">
                    <input type="hidden" id="tipo" name="tipo">
                    <input type="hidden" id="trimestre" name="trimestre">
                    <input type="hidden" id="id-proyecto" name="id_proyecto" value="{{$proyecto->id}}">

                    <input type="file" id="inputFile">
                </form>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="cancel" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>


      
<!----modal eliminar---->

  <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <h1 class="modal-title fs-5 " ><strong>Eliminar Archivo</strong></h1>
          <button class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
        <div class="modal-body">
            ¿Estas seguro de eliminar el archivo?
        </div>
        <div class="modal-footer">
          <button type="submit" class="guardar" data-bs-dismiss="modal"><a  id="eliminar-a">Eliminar</a></button>
          <button type="button" class=" cancel" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>



<script>
    function CompletarId(id){
        var eliminar=document.getElementById("eliminar-a");

        var route="{{route('archivos-destroy',['id'=>""])}}";
        route=route+"/"+id;
        eliminar.href=route;
    }

</script>

<script>
    const LABELS = {
        title: `
          <span class="text-uppercase text-bold text-navy">Arrastre y suelte sus archivos</span>
          <span class="filepond--label-action text-uppercase text-navy">aqui</span>
      `,
        invalid: 'el campo contiene archivos no válidos',
        done: 'carga completa'
    };
</script>


<script>

    var inputTipo=document.getElementById('tipo');
    var inputTrimestre=document.getElementById('trimestre');
    var inputId=document.getElementById('id-proyecto');

    function completar(tipo,trimestre){
        inputTipo.value=tipo;
        inputTrimestre.value=trimestre;
    }

    FilePond.registerPlugin(FilePondPluginFileValidateType);
   $('#inputFile').filepond({
       
       name: 'document',
       instantUpload: false,
       allowMultiple: true,
       maxFiles: 10,
       acceptedFileTypes: ['application/pdf'],
       server: {
           url: "{{ route('registro_archivos')}}",
           process: {
               headers: {
                   'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
               onload: (response) => {
                   console.log(response, 'ONLOAD');
                   // window.location.reload(true)
               },
               ondata: (formData) => {
                   formData.append('token', "{{ csrf_token() }}");
                   formData.append('tipo',inputTipo.value);
                   formData.append('trimestre',inputTrimestre.value);
                   formData.append('id_proyecto','{{$proyecto->id}}');
                   return formData;
               }
           },
           fetch: null,
           revert: null
       },
       labelIdle: LABELS.title,
       labelInvalidField: LABELS.invalid,
       labelFileTypeNotAllowed: LABELS.invalid,
       labelFileProcessingComplete: LABELS.done,
       onprocessfiles: function() {
          // console.log(this);
         //  console.log('todos los files han sido cargados');
           location.reload();
       },
       onwarning: function(error, file, status) {
           //console.log('WARNING...', error, status);
       },
       onerror: function(error, file, status) {
          // console.log('ERROR...', error, status, file);
       },
       onprocessfile: function(error, file) {
          // console.log(this);
          // console.log('UN ARCHIVO PROCESASO', error, file);
       }
   });

</script>
</div>
@endsection