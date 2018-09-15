@section('css_auth')
<link rel="stylesheet" href="{{ asset('css/guest/style.css') }}" type="text/css">
@endsection
@section('navegation')
<header>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="{{ route('welcome') }}" >
        <strong> <i class="fa fa-wrench mr-2"></i>{{ config('app.name', 'Laravel') }}</strong>
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
 
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
        @if (Auth::guest())                     
          <li class="nav-item {{(\Request::is('login'))?'active':''}}">
            <a href="{{ route('login') }}" class="nav-link border border-light rounded hoverable hoverable waves-light"
              >
              <i class="fa fa-sign-in mr-2"></i>Iniciar sesión
            </a>
          </li>
          <li class="nav-item {{(\Request::is('register'))?'active':''}}">
            <a href="{{ route('register') }}" class="nav-link border border-light rounded hoverable waves-light">
              <i class="fa fa-user-plus mr-2"></i>Registrarse
            </a>
          </li>
          @else
          <li class="nav-item dropdown active">
                    <a class="nav-link border border-light rounded dropdown-toggle hoverable waves-light" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle mr-2"></i>{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right menu-sup" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{ route('home') }}" class="dropdown-item hoverable waves-light"><i class="fa fa-home mr-2"></i>Página principal</a>
                        <a class="dropdown-item hoverable waves-effect" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <i class="fa fa-sign-out ml-2"></i> Cerrar sesión
                                      </a>                      
                    </div>
                </li>
          @endif
        </ul>

      </div>

    </div>
  </nav>
  @yield('content')
</header>
@endsection
