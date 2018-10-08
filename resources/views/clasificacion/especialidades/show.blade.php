@extends('layouts.dashboard.main')
@section('template_title')
Información de la especialidad "{{ $especialidad->nombre }}" | {{ config('app.name', 'Laravel') }}
@endsection
@section('content')
        <div class="container-fluid">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn hoverable">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    <span><i class="fa fa-object-group mr-1"></i></span>
                        <a href="{{ route('especialidades.index') }}">Lista de especialidades</a>
                        <span>/</span>
                        <span>Información de la especialidad "{{ $especialidad->nombre }}"</span>
                    </h4>

                    <div class="d-flex justify-content-center">
                    <a href="{{ route('especialidades.index') }}" class="btn btn-outline-secondary btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Lista de especialidades">
                      <i class="fa fa-2x fa-object-group"></i>
                            </a>

                             <a href="{{ URL::to('especialidades/' . $especialidad->id.'/edit') }}" class="btn btn-outline-warning btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title='Editar la especialidad "{{ $especialidad->nombre }}"'>
                      <i class="fa fa-2x fa-pencil-alt"></i>
                            </a>

                                    <a onclick="eliminar_especialidad({{ $especialidad->id }},'{{ $especialidad->nombre }}')"  class="btn btn-outline-danger btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title='Eliminar la especialidad "{{ $especialidad->nombre }}"'>
                      <i class="fa fa-2x fa-trash-alt"></i>
                            </a>
                            <form id="eliminar{{ $especialidad->id }}" method="POST" action="{{ URL::to('especialidades/' . $especialidad->id) }}" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
</form>
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
      <i class="fa fa-object-group  mr-2"></i><strong>Especialidad #{{ $especialidad->id }}</strong>
    </a>
  <a class="list-group-item waves-effect hoverable"><strong><i class="fa mr-4"></i>Nombre: </strong>{{ $especialidad->nombre }}</a>
</div>
                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

               <!--Grid row-->
               <div class="row mt-5">

                  <!--Grid column-->
                  <div class="col-12">
  
                      <!--Card-->
                      <div class="card hoverable"> 
                          <!--Card content-->
                          <div class="card-body">
                              <h4><i class="fa fa-sitemaps mr-2"></i>
                              @if (count($especialidad->categorias) === 1)
                  Una categoria de "{{ $especialidad->nombre }}"
              @elseif (count($especialidad->categorias) > 1)
                  {{ count($especialidad->categorias) }} categorias de "{{ $especialidad->nombre }}"
              @else
                 No hay categorias de "{{ $especialidad->nombre }}"
              @endif
              </h4>
                          <div class="table-responsive">
                              <!-- Table  -->
                              <table id="dtcategorias" class="table table-borderless table-hover display dt-responsive nowrap" cellspacing="0" width="100%">
    <thead class="th-color white-text">
      <tr class="z-depth-2">
        <th class="th-sm">#
        </th>
        <th class="th-sm">Nombre
        </th>
        <th class="th-sm">Etiqueta
        </th>
        <th class="th-sm">Tipo de categoria
        </th>
        <th class="th-sm">Acciones
        </th>
     
      </tr>
    </thead>
    <tbody>
    @foreach($especialidad->categorias as $key => $categoria)
      <tr class="hoverable">
        <td>{{$categoria->id}}</td>
        <td>{{$categoria->nombre}}</td>
        <td>{{$categoria->etiqueta}}</td>
        <td>{{$categoria->especialidad->nombre}}</td>
        <td>
  
  <a href="{{ URL::to('categorias/' . $categoria->id) }}" class="text-primary m-1" 
                      data-toggle="tooltip" data-placement="bottom" title='Información del categoria "{{ $categoria->nombre }}"'>
                        <i class="fa fa-2x fa-info-circle"></i>
                              </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
                              <!-- Table  -->
                              </div>
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
<script type="text/javascript">
function eliminar_especialidad(id,nombre){
    swal({
  title: 'Eliminar la especialidad',
  text: '¿Desea eliminar la especialidad "'+nombre+'"?',
  type: 'question',
  confirmButtonText: '<i class="fa fa-trash-alt"></i> Eliminar',
  cancelButtonText: '<i class="fa fa-times"></i> Cancelar',
  showCancelButton: true,
  showCloseButton: true,
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
  animation: false,
  customClass: 'animated zoomIn',
}).then((result) => {
  if (result.value) {
    $( "#eliminar"+id ).submit();
  }else{
    swal({
  position: 'top-end',
  type: 'error',
  title: 'Operación cancelada por el usuario',
  showConfirmButton: false,
  toast: true,
  animation: false,
  customClass: 'animated lightSpeedIn',
  timer: 3000
})
  }
})
}
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection