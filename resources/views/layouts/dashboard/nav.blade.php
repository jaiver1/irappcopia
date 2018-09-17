@section('css_auth')
<link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}" type="text/css">
@endsection
@section('navegation')
<header>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="{{ route('home') }}">
                    <strong class="blue-text">{{ config('app.name', 'Laravel') }}</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{(\Request::is('home'))?'active':''}}">
                            <a class="nav-link waves-effect" href="{{ route('home') }}">
                            <i class="fa fa-home mr-2"></i>Página principal
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{(\Request::is('usuarios') || \Request::is('usuarios/*'))?'active':''}}">
                            <a class="nav-link waves-effect" href="{{ route('usuarios.index') }}">
                            <i class="fa fa-users mr-2"></i>Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/getting-started/" target="_blank">Free download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank">Free tutorials</a>
                        </li>
                        <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right menu-sup" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item hoverable waves-effect" href="#">Action</a>
                        <a class="dropdown-item hoverable waves-effect" href="#">Another action</a>
                        <a class="dropdown-item hoverable waves-effect" href="#">Something else here</a>
                    </div>
                </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        
                    <li class="nav-item dropdown active">
                    <a class="nav-link border border-light rounded dropdown-toggle hoverable waves-effect" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle mr-2"></i>{{ Auth::user()->name }}
                    </a>
                    <div class="user-name-sup dropdown-menu dropdown-menu-right menu-sup" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item hoverable waves-effect" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <i class="fa fa-sign-out mr-2"></i> Cerrar sesión
                                      </a>                      
                    </div>
                </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed special-color-dark position-fixed">

            <a class="logo-wrapper waves-effect" href="{{ route('home') }}">
                <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="Logo">
            </a>

            <div class="list-group list-group-flush side-group">
                <a href="{{ route('home') }}" 
                class=" {{(\Request::is('home'))?'active white-text':''}} list-group-item-action list-group-item waves-effect">
                    <i class="fa fa-home mr-2"></i>Página principal</a>
                    <a href="{{ route('usuarios.index') }}" 
                class=" {{(\Request::is('usuarios') || \Request::is('usuarios/*'))?'active white-text':''}} list-group-item-action list-group-item waves-effect">
                    <i class="fa fa-users mr-2"></i>Usuarios</a>
                

<div class="accordion" id="accordionExample2">


<a id="headingOne" class="{{(\Request::is('clientes') || \Request::is('clientes/*') || \Request::is('colaboradores') || \Request::is('colaboradores/*') ) ? 'active white-text':''}} list-group-item-action list-group-item waves-effect" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
<i class="fa fa-address-book mr-2"></i>  Contactos
</a>
<div id="collapseTwo" class="collapse {{(\Request::is('clientes') || \Request::is('clientes/*') || \Request::is('colaboradores') || \Request::is('colaboradores/*') ) ? 'show':''}}" aria-labelledby="headingOne" data-parent="#accordionExample2">
<!-- List group links -->
<div class="list-group list-group-flush sub-side-group">
<a href="{{ route('clientes.index') }}" class="list-group-item-action list-group-item waves-effect {{(\Request::is('clientes') || \Request::is('clientes/*')) ? 'active white-text':''}}">
            <i class="fa fa-pie-chart mr-2"></i>Clientes</a>
        <a href="{{ route('colaboradores.index') }}" class="list-group-item-action list-group-item waves-effect {{(\Request::is('colaboradores') || \Request::is('colaboradores/*')) ? 'active white-text':''}}">
            <i class="fa fa-user mr-2"></i>Colaboradores</a>
      
                    </div>
                    <!-- List group links -->
</div>

    </div>



                    <div class="accordion" id="accordionExample1">


<a id="headingOne" class="{{(\Request::is('clientes') || \Request::is('clientes/*') || \Request::is('colaboradores') || \Request::is('colaboradores/*') ) ? 'active white-text':''}} list-group-item-action list-group-item waves-effect" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<i class="fa fa-money mr-2"></i>  Datos basicos
</a>
<div id="collapseOne" class="collapse {{(\Request::is('clientes') || \Request::is('clientes/*') || \Request::is('colaboradores') || \Request::is('colaboradores/*') ) ? 'show':''}}" aria-labelledby="headingOne" data-parent="#accordionExample1">
<!-- List group links -->
<div class="list-group list-group-flush sub-side-group">
<a href="{{ route('clientes.index') }}" class="list-group-item-action list-group-item waves-effect {{(\Request::is('clientes') || \Request::is('clientes/*')) ? 'active white-text':''}}">
            <i class="fa fa-pie-chart mr-2"></i>Tipo medidas</a>
        <a href="{{ route('colaboradores.index') }}" class="list-group-item-action list-group-item waves-effect {{(\Request::is('colaboradores') || \Request::is('colaboradores/*')) ? 'active white-text':''}}">
            <i class="fa fa-user mr-2"></i>Medidas</a>
      
                    </div>
                    <!-- List group links -->
</div>

    </div>

                  
            

        </div>
        <!-- Sidebar -->

</header>
@endsection
