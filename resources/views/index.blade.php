<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POAs</title>

  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@200&display=swap" rel="stylesheet">
  
        
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

   

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

   @yield('head')
</head>
<body>
    <x-header/>
    @yield('body')
    
    @auth
    <div class="offcanvas offcanvas-start sidebar-div"  id="sidebar" >
        <div class="offcanvas-body sidebar-content">

            <a href="{{route('home')}}" class="list-group-item"><i class="bi bi-book"></i>Información general</a>
            <a href="{{route('operacionesAsignadas',['id'=>auth()->user()->id])}}" class="list-group-item"><i class="bi bi-card-checklist"></i>Operaciones y proyectos</a>
            <a href="{{route('usuarios')}}" class="list-group-item"><i class="bi bi-people"></i>Usuarios</a>
            <a href="{{route('gestiones')}}" class="list-group-item"> <i class="bi bi-folder2-open"></i> Gestiones</a>
        </div>
    </div>
    @endauth
  

    <script>
        
        function cancelar(){
            messageError=document.getElementsByClassName('error');
        
            if(messageError){
                Array.from(messageError).forEach(element => {
                    element.style.display="none";
                }); 
            }

            input=document.getElementsByClassName('input');
            if(input){
                Array.from(input).forEach(element => {
                    element.value="";
                }); 
            }
        }

    </script>
</body>
</html>