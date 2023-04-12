<nav class="navbar navbar-top navbar-horizontal navbar-expand-md " style="background-color:#008a8a">
    <div class="row justify-content-start">
       <br>
            <b style="font-size: 20px; color: #fff; margin: 20px 0px 20px 20px;">     CENTRO DE ESTUDIOS SUPERIORES FELIPE VILLANUEVA</b>
    </div>

        <div class="collapse navbar-collapse" >

            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://felipevillanueva.edu.mx/">
                        <i class="fa fa-globe" style="font-size: 18px;">   </i>
                        <span class="nav-link-inner-text" style="font-size: 17px;"> Felipe Villanueva</span>
                    </a>
                </li>
               <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                        <i class="fa fa-user-plus" style="font-size: 18px;">  </i>
                        <span class="nav-link-inner-text" style="font-size: 17px;">  {{ __('Registro') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                        <i class="fa fa-key" style="font-size: 18px;"></i>
                        <span class="nav-link-inner--text" style="font-size: 17px;">{{ __('Iniciar Sesión') }}</span>
                    </a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>