<div>
    <nav>
        <div class="nav">
          
          @auth
          <button class="btn-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            ☰
          </button>
          @endauth


          <img src="{{asset('images/INF-SIS.png')}}" alt="">
          Departamento de Informática y Sistemas - POAS  
          </div>
        
          @auth
          <div class="auth">
            <span class="info-header">{{auth()->user()->nombre}}</span>
            <span class="info-header"><a href="{{route('logout')}}" >Cerrar sesión</a></span>
          </div>
          @endauth 
          
    </nav>
</div>