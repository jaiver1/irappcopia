@extends('layouts.dashboard.main')
@section('template_title')
Tipos de medidas eliminadas | {{ config('app.name', 'Laravel') }}
@endsection
@section('footer_title')
Tipos de medidas eliminadas | {{ config('app.name', 'Laravel') }}
@endsection
@section('css_links')
<link rel="stylesheet" href="{{ asset('css/addons/datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/addons/bt4-datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/addons/bt4-responsive-datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/addons/bt4-buttons-datatables.min.css') }}" type="text/css">
@endsection
@section('content')
<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn hoverable">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="{{ route('tipos_medidas.index') }}">Lista de tipos de medidas</a>
                        <span>/</span>
                        <span> @if (count($tipos_medidas) === 1)
                Un tipos de medida eliminado
            @elseif (count($tipos_medidas) > 1)
                {{ count($tipos_medidas) }} tipos de medidas eliminados
            @else
               No hay tipos de medidas eliminados
            @endif
            </span>
                    </h4>
                    <div class="d-flex justify-content-center">
                    <a href="{{ route('tipos_medidas.index') }}" class="btn btn-outline-secondary btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Lista de tipos_medidas">
                      <i class="fa fa-2x fa-tachometer"></i>
                            </a>
                    </div>

                </div>

            </div>
            <!-- Heading -->

         
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-12">

                    <!--Card-->
                    <div class="card hoverable"> 
                        <!--Card content-->
                        <div class="card-body">
                        <div class="table-responsive">
                            <!-- Table  -->
                            <table id="dttipos_medidas" class="table table-borderless table-hover display dt-responsive nowrap" cellspacing="0" width="100%">
  <thead class="bg-danger white-text">
    <tr class="z-depth-2">
      <th class="th-sm">#
      </th>
      <th class="th-sm">Nombre
      </th>
   
    </tr>
  </thead>
  <tbody>
  @foreach($tipos_medidas as $key => $tipo_medida)
    <tr class="hoverable">
      <td>{{$tipo_medida->id}}</td>
      <td>{{$tipo_medida->nombre}}</td>
      <td>

      <a onclick="restaurar_tipos_medida({{ $tipo_medida->id }},'{{ $tipo_medida->nombre }}')" class="text-success m-1" 
                    data-toggle="tooltip" data-placement="bottom" title='Restaurar el tipos_medida "{{ $tipo_medida->nombre }}"'>
                      <i class="fa fa-2x fa-undo"></i>
                            </a>
                
                            <a onclick="eliminar_tipos_medida({{ $tipo_medida->id }},'{{ $tipo_medida->nombre }}')" class="text-danger m-1" 
                    data-toggle="tooltip" data-placement="bottom" title='Eliminar definitivamente el tipos_medida "{{ $tipo_medida->nombre }}"'>
                      <i class="fa fa-2x fa-trash-alt"></i>
                            </a>
                            <form id="restaurar{{ $tipo_medida->id }}" method="POST" action="{{ URL::to('tipos_medidas/deleted/' . $tipo_medida->id) }}" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }}
</form>
                            <form id="eliminar{{ $tipo_medida->id }}" method="POST" action="{{ URL::to('tipos_medidas/deleted/' . $tipo_medida->id) }}" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
</form>
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
    </main>
    <!--Main layout-->
@endsection
@section('js_links')
<!-- DataTables core JavaScript -->
<script type="text/javascript" src="{{ asset('js/addons/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/bt4-datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/responsive-datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/bt4-responsive-datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/buttons-datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/bt4-buttons-datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">

function eliminar_tipos_medida(id,nombre){
    swal({
  title: 'Eliminar tipos_medida',
  text: '¿Desea eliminar definitivamente el tipos_medida "'+nombre+'"?',
  type: 'warning',
  confirmButtonText: '<i class="fa fa-trash"></i> Eliminar',
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
  title: 'Operación cancelada por el tipos_medida',
  showConfirmButton: false,
  toast: true,
  animation: false,
  customClass: 'animated lightSpeedIn',
  timer: 3000
})
  }
})
}

function restaurar_tipos_medida(id,nombre){
    swal({
  title: 'Restaurar tipos_medida',
  text: '¿Desea restaurar el tipos_medida "'+nombre+'"?',
  type: 'question',
  confirmButtonText: '<i class="fa fa-undo"></i> Restaurar',
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
    $( "#restaurar"+id ).submit();
  }else{
    swal({
  position: 'top-end',
  type: 'error',
  title: 'Operación cancelada por el tipos_medida',
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
$(document).ready(function() {
    moment.locale('es');
var datetime =  moment().format('DD MMMM YYYY, h-mm-ss a'); 
    var titulo_archivo = "Lista de tipos_medidas eliminados ("+datetime+")";
     $('#dttipos_medidas').DataTable( {
        dom: 'Bfrtip',
    lengthMenu: [
        [ 2, 5, 10, 20, 30, 50, 100, -1 ],
        [ '2 rows', '5 rows', '10 rows', '20 rows','30 rows', '50 rows', '100 rows', 'Show all' ]
    ],
        buttons: [

            {
                extend: 'collection',
                text:      '<i class="fa fa-2x fa-cog fa-spin"></i>',
                titleAttr: 'Opciones',
                buttons: [
                    {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-copy"></i> Copiar',
                titleAttr: 'Copiar',
                title: titulo_archivo
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> Imprimir',
                titleAttr: 'Imprimir',
                title: titulo_archivo
            },
            {
                extend: 'collection',
                text:      '<i class="fa fa-cloud-download-alt"></i> Exportar',
                titleAttr: 'Exportar',
                buttons: [         
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-alt"></i> Csv',
                titleAttr: 'Csv',
                title: titulo_archivo
            }, 
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel"></i> Excel',
                titleAttr: 'Excel',
                title: titulo_archivo
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf"></i> Pdf',
                titleAttr: 'Pdf',
                title: titulo_archivo
            }
        ]
    },
           
            {
                extend:    'colvis',
                text:      '<i class="fa fa-low-vision"></i> Ver/Ocultar',
                titleAttr: 'Ver/Ocultar',
            }
           
                ]
            },
            'pageLength'
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Datos de tipos_medida eliminado '+ data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );


            $('.dataTables_length').addClass('bs-select');
        });
</script>
@endsection