@extends('layouts.dashboard.main')
@section('template_title')
Información del usuario "{{ $usuario->name }}" | {{ config('app.name', 'Laravel') }}
@endsection
@section('footer_title')
Información del usuario "{{ $usuario->name }}" | {{ config('app.name', 'Laravel') }}
@endsection
@section('content')
<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn hoverable">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="{{ route('usuarios.index') }}">Lista de usuarios</a>
                        <span>/</span>
                        <span>Información del usuario "{{ $usuario->name }}"</span>
                    </h4>

                    <div class="d-flex justify-content-center">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Lista de usuarios">
                      <i class="fa fa-2x fa-users"></i>
                            </a>

                             <a href="{{ URL::to('usuarios/' . $usuario->id.'/edit') }}" class="btn btn-outline-warning btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title='Editar usuario "{{ $usuario->name }}"'>
                      <i class="fa fa-2x fa-pencil-alt"></i>
                            </a>
                    </div>

                </div>

            </div>
            <!-- Heading -->

         
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-12">

                    <!--Card-->
                    <div class="card wow fadeIn hoverable">

                        <!--Card content-->
                        <div class="card-body">

<div class="list-group hoverable">
  <a class="list-group-item active z-depth-2 white-text waves-light hoverable">
      <i class="fa fa-user mr-2"></i><strong>Usuario #{{ $usuario->id }}</strong>
    </a>
  <a class="list-group-item waves-effect hoverable"><strong>Nombre: </strong>{{ $usuario->name }}</a>
  <a class="list-group-item waves-effect hoverable"><strong>Email: </strong>{{ $usuario->email }}</a>
  <a class="list-group-item waves-effect hoverable"><strong>Rol: </strong>{{ $usuario->rol }}</a>
</div>
                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

          
        </div>
    </main>
    <!--Main layout-->
@endsection
@section('js_links')
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection