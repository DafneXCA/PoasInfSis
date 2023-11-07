@extends('index')
@section('head')
<link rel="stylesheet" href="{{asset('css/detalleOperacion.css')}}">
@endsection
@section('body')
<div class="body-content">
    
    <div class="box-content">
        <div class="title"><strong>Operación 1</strong><br>Estado: En progreso 47%</div>
        <div class="detail-content">
            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 1</strong></div>
                <div class="content-detail">
                    <div class="content-archive"><span><i class="bi bi-archive"></i>Archivos respaldatorios</span><div class="button"><button data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir</button></div></div>
                    <div class="content-form"><span><i class="bi bi-file-earmark-text"></i>Formularios</span><div class="button"><button>Añadir</button></div></div> 
                </div>
            </div>

            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 2</strong></div>
                <div class="content-detail">
                    <div class="content-archive"><span><i class="bi bi-archive"></i>Archivos respaldatorios</span><div class="button"><button>Añadir</button></div></div>
                    <div class="content-form"><span><i class="bi bi-file-earmark-text"></i>Formularios</span><div class="button"><button>Añadir</button></div></div> 
                </div>
            </div>

            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 3</strong></div>
                <div class="content-detail">
                    <div class="content-archive"><span><i class="bi bi-archive"></i>Archivos respaldatorios</span><div class="button"><button>Añadir</button></div></div>
                    <div class="content-form"><span><i class="bi bi-file-earmark-text"></i>Formularios</span><div class="button"><button>Añadir</button></div></div> 
                </div>
            </div>

            <div class="detail">
                <div class="text-center detail-title"><strong>TRIMESTRE 4</strong></div>
                <div class="content-detail">
                    <div class="content-archive"><span><i class="bi bi-archive"></i>Archivos respaldatorios</span><div class="button"><button>Añadir</button></div></div>
                    <div class="content-form"><span><i class="bi bi-file-earmark-text"></i>Formularios</span><div class="button"><button>Añadir</button></div></div> 
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <h1 class="modal-title fs-5 " ><strong>Agregar Archivos</strong></h1>
              <button class="btn-close" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form">
                    <input type="file" id="inputFile">
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class=" cancel" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


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