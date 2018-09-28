@extends('layouts.dashboard.main')
@include('root.usuarios.form')
@section('template_title')
Registrar usuario | {{ config('app.name', 'Laravel') }}
@endsection
@section('footer_title')
Registrar usuario | {{ config('app.name', 'Laravel') }}
@endsection
@section('css_links')
<link rel="stylesheet" href="{{ asset('css/addons/select2.css') }}" type="text/css"/>
@endsection
@section('content')

        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn hoverable">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="{{ route('usuarios.index') }}">Lista de usuarios</a>
                        <span>/</span>
                        <span>Registrar usuario</span>
                    </h4>

                    <div class="d-flex justify-content-center">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Lista de usuarios">
                      <i class="fa fa-2x fa-users"></i>
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

                          <!-- Extended material form grid -->
@yield('crud_form')
<!-- Extended material form grid -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

          
        </div>

@endsection
@section('js_links')
<script type="text/javascript" src="{{ asset('js/addons/select2.min.js') }}"></script>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function() {
    $('#rol').select2({
        placeholder: "Roles",
        theme: "material"
    });
    $(".select2-selection__arrow")
        .addClass("fa fa fa-chevron-down");
});
</script>
@endsection