<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background-color:#008a8a">

        <div class="container-fluid" >

             <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                    
                        <div class="media-body ml-2 d-none d-lg-block" id="menu">
                            <span>
                                <i class="fa fa-bars" style="font-size: 25px;"></i>
                            </span>
                        </div>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                       <div class="col-12 collapse-brand" align="center">
                            <a href="{{ route('home') }}">
                            <br>
                                <img src="{{ asset('/img/logo2.png') }}" height="150" width="150">
                            </a>
                        </div>
                    <br>

                            <a class="dropdown-item" href="{{ route('home') }}" style="font-size: 16px;">
                                <i class="fa fa-home" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" >Inicio</span>
                            </a>
                    

                            @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('Control Escolar'))

                           
                                <a class="dropdown-item" href="{{ route('cuatrimestre.index') }}" style="font-size: 16px;">
                                    <i class="fa fa-check" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                    <span class="nav-link-text" style="color: black;" >Cuatrimestres</span>
                                </a>

                                <a class="dropdown-item" href="{{ route('puesto.index') }}" style="font-size: 16px;">
                                    <i class="fa fa-briefcase" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                    <span class="nav-link-text" style="color: black;" >Puestos</span>
                                </a>

                                <a class="dropdown-item" href="{{ route('contacto.index') }}" style="font-size: 16px;">
                                <i class="fa fa-address-book" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Contactos </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('domicilio.index') }}" style="font-size: 16px;">
                                <i class="fa fa-map-marker" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Domicilios </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('tipo_asistencia.index') }}" style="font-size: 16px;">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Tipos asistencias </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('carrera.index') }}" style="font-size: 16px;">
                                <i class="fa fa-flag-checkered" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Carreras </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('grupo.index') }}" style="font-size: 16px;">
                                <i class="fa fa-users" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Grupos </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('alumno.index') }}" style="font-size: 16px;">
                                <i class="fa fa-graduation-cap" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Alumnos </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('materia.index') }}"style="font-size: 16px;">
                                <i class="fa fa-book" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Materias </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('grupo_materia.index') }}"style="font-size: 16px;">
                                <i class="fa fa-calendar-check" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Asignar </span>
                            </a>

                             <a class="dropdown-item" href="{{ route('calificacion.index') }}" style="font-size: 16px;">
                                <i class="fa fa-calendar-check" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Calificaciones </span>
                            </a>


                            @endif


                            @if(@Auth::user()->hasRole('Alumno'))

                            <a class="dropdown-item" href="{{ route('dashe') }}" style="font-size: 16px;">
                                        <i class="fa fa-id-card-o" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                        <span class="nav-link-text" style="color: black;" > Mis datos </span>
                                    </a>
                            
                                <a class="dropdown-item" href="{{ route('puesto.index') }}" style="font-size: 16px;">
                                    <i class="fa fa-university" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                    <span class="nav-link-text" style="color: black;" > Mis calificaciones </span>
                                </a>

                            @endif
                           

                            @if(@Auth::user()->hasRole('Administrador'))

                            <a class="dropdown-item" href="{{ route('empleado.index') }}" style="font-size: 16px;">
                                <i class="fa fa-user" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Personal </span>
                            </a>

                            <a class="dropdown-item" href="{{ route('plantel.index') }}" style="font-size: 16px;">
                                <i class="fa fa-university" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Planteles </span>
                            </a>

                            @endif

                          

                            @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('Profesor'))

                            <a class="dropdown-item" href="{{ route('asistencia.index') }}" style="font-size: 16px;">
                                <i class="fa fa-calendar-check" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Toma de Asistencia </span>
                            </a>

                            @endif


                           
                            @if( @Auth::user()->hasRole('Profesor'))

                            <a class="dropdown-item" href="{{ route('calificacion.index') }}" style="font-size: 16px;">
                                <i class="fa fa-calendar-check" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                                <span class="nav-link-text" style="color: black;" > Calificaciones </span>
                            </a>
                          
                            @endif
                           

                           


                       <!--  <a class="dropdown-item" href="#">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                      <span class="nav-link-text">Docentes</span>
                  </a>


                  <a class="dropdown-item" href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="nav-link-text">Grupos</span>
                    </a>

                     <a class="dropdown-item" href="#">
                     <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="nav-link-text">Materias</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-flag-checkered" aria-hidden="true"></i>
                        <span class="nav-link-text">Carreras</span>
                    </a>
                    <div class=" dropdown-header noti-title">
                      <h6 class="text-overflow m-0" style="font-size: 12px;">Asignar</h6>
                   </div>
                  <a class="dropdown-item" href="#">
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                        <span class="nav-link-text">Asignar materias</span>
                    </a>
                     <div class=" dropdown-header noti-title">
                      <h6 class="text-overflow m-0" style="font-size: 12px;">Usuarios</h6>
                    </div>
                      <a class="dropdown-item" href="#">
                        <i class="fa fa-key" aria-hidden="true"></i>
                      <span class="nav-link-text">Roles</span>
                  </a>

                    <a class="dropdown-item  nav-link-icon" href="#">
                    <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="nav-link-text">Usuarios</span>
                    </a>
               -->
                    
                  
                </div>
            </li>
        </ul>
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}"></a>
        <!-- Form -->
       <!--  <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Buscar" type="text">
                </div>
            </div>
        </form> -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" id="menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                <!-- <img alt="Image placeholder" src="../img/faces/2491055.png" width="28px"> -->
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block"> 
                            <span class="mb-0 text-sm  font-weight-bold" style="font-size: 14px;">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <!-- <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bienvenido!') }}</h6>
                    </div> -->
                    <a href="{{ route('profile.edit') }}" style="color: black; font-size: 14px;" class="dropdown-item">
                        <i class="fa fa-user" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;">  </i>
                        <span >{{ __('Mi perfil') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                                @csrf
                        </form>
                        <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();" style="color: black; font-size: 14px;">
                            <i class="fa fa-sign-out" aria-hidden="true" style="margin: 0 10px 0 0; color: #63C6B9;"></i>
                            <span>{{ __('Cerrar Sesión') }}</span>
                        </a>
                </div>
            </li>
        </ul>
       
    </div>
    <br><br><br>

       
        <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn-magnify" href="#pablo">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Stats') }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                            <a class="dropdown-item" href="#">{{ __('My profile') }}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div> -->
</nav>


<style>
      select{
        color: #333 !important;
      }
      thead{
        text-align:center;
        background: #cecece;
      }
      .w-5{
        width: 40px !important;
      }

      #sinDeudas h2{
        color: green;
        font-weight: 600;
        background-color: #f9f9f9;
        padding: 15px 5px;
      }
      .sidebar .nav .nav-item.active > .nav-link i,.dropdown-item i, .sidebar .nav .nav-item.active > .dropdown-item, .nav-link .menu-title, .sidebar .nav .nav-item.active > .dropdown-item, .nav-link .menu-arrow{
        color: #1ec7cd !important;
      }
      .btn-primary {
        color: #fff;
        background-color: #1ec7cd;
        border-color: #1ec7cd;
      }
      .btn-primary:hover{
        background-color: #1ec7cd;
        border-color: #1ec7cd;
      }
      .nav-link:hover{
        color: #1ec7cd !important;
        font-weight: 600;
      }
      .dropdown-item:hover{
        color: #1ec7cd !important;
        font-weight: 600;
      }
      .text-primary{
        color: #1ec7cd !important;
      }
      .mdi-menu{
        color: #fff !important;
      }
      label{
        max-width: 100% !important;
      }
      /*nav*/
#btn-menu{
    display: none;
  }
  .container-menu{
    position: absolute;
    background: rgba(0,0,0,0.5);
    width: 100%;
    height: 100vh;
    top: 0;left: 0;
    transition: all 500ms ease;
    opacity: 0;
    visibility: hidden;
  }
  #btn-menu:checked ~ .container-menu{
    opacity: 1;
    color: #fff;
    visibility: visible;
  }
  .cont-menu{
    width: 100%;
    max-width: 250px;
    background: #1c1c1c;
    height: 100vh;
    position: relative;
    transition: all 500ms ease;
    transform: translateX(-100%);
  }
  #btn-menu:checked ~ .container-menu .cont-menu{
    transform: translateX(0%);
  }
  .cont-menu nav{
    transform: translateY(15%);
  }
  .cont-menu nav a{
    display: block;
    text-decoration: none;
    padding: 20px;
    color: #c7c7c7;
    border-left: 5px solid transparent;
    transition: all 400ms ease;
  }
  .cont-menu nav a:hover{
    border-left: 5px solid #c7c7c7;
    background: #1f1f1f;
  }
  .cont-menu label{
    position: absolute;
    right: 5px;
    top: 10px;
    color: #fff;
    cursor: pointer;
    font-size: 18px;

  }

  



    .navbar .dropdown-menu
    {
        margin: 0; 

        pointer-events: none;

        opacity: 0;
    }
    .navbar .dropdown-menu-arrow:before
    {
        position: absolute;
        z-index: -5;
        bottom: 100%;
        left: 20px;

        display: block;

        width: 12px;
        height: 12px;

        content: '';
        transform: rotate(-45deg) translateY(12px);

        border-radius: 2px; 
        background: #fff;
        box-shadow: none;
    }
    .navbar .dropdown-menu-right:before
    {
        right: 20px;
        left: auto;
    }
    .navbar:not(.navbar-nav-hover) .dropdown-menu.show
    {
        animation: show-navbar-dropdown .25s ease forwards; 
        pointer-events: auto;

        opacity: 1;
    }
    .navbar:not(.navbar-nav-hover) .dropdown-menu.close
    {
        display: block;

        animation: hide-navbar-dropdown .15s ease backwards;
    }
    .navbar.navbar-nav-hover .dropdown-menu
    {
        display: block;

        transition: visibility .25s, opacity .25s, transform .25s; 
        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
        pointer-events: none;

        opacity: 0;
    }
    .navbar.navbar-nav-hover .nav-item.dropdown:hover > .dropdown-menu
    {
        display: block;
        visibility: visible;

        transform: translate(0, 0);
        animation: none; 
        pointer-events: auto;

        opacity: 1;
    }
    .navbar .dropdown-menu-inner
    {
        position: relative;

        padding: 1rem;
    }
    @keyframes show-navbar-dropdown
    {
        0%
        {
            transition: visibility .25s, opacity .25s, transform .25s; 
            transform: translate(0, 10px) perspective(200px) rotateX(-2deg);

            opacity: 0;
        }
        100%
        {
            transform: translate(0, 0);

            opacity: 1;
        }
    }
    @keyframes hide-navbar-dropdown
    {
        from
        {
            opacity: 1;
        }
        to
        {
            transform: translate(0, 10px); 

            opacity: 0;
        }
    }

.navbar-collapse-header
{
    display: none;
}


    </style>