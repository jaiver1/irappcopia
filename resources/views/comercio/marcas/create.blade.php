@extends('layouts.dashboard.main')
@include('comercio.marcas.form')
@section('template_title')
Registrar una marca | {{ config('app.name', 'Laravel') }}
@endsection
@section('content')

        <div class="container-fluid">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn hoverable">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    <span><i class="fa fa-ruler mr-1"></i></span> 
                        <a href="{{ route('marcas.index') }}">Lista de marcas</a>
                        <span>/</span>
                        <span>Registrar una marca</span>
                    </h4>

                    <div class="d-flex justify-content-center">
                    <a href="{{ route('marcas.index') }}" class="btn btn-outline-secondary btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Lista de marcas">
                      <i class="fa fa-2x fa-ruler"></i>
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
