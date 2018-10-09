@extends('layouts.dashboard.main')
@section('template_title')
Lista de categorias | {{ config('app.name', 'Laravel') }}
@endsection
@section('css_links')
<link rel="stylesheet" href="{{ asset('css/addons/datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/addons/bt4-datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/addons/bt4-responsive-datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/addons/bt4-buttons-datatables.min.css') }}" type="text/css">
@endsection
@section('content')
        <div class="container-fluid">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn hoverable">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    <span><i class="fa fa-sitemap mr-1"></i></span> <span> @if (count($categorias) === 1)
                Una categoria
            @elseif (count($categorias) > 1)
                {{ count($categorias) }} categorias
            @else
               No hay categorias
            @endif
            </span>
                    </h4>

                    <div class="d-flex justify-content-center">
                    <a href="{{ route('categorias.create') }}" class="btn btn-outline-success btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Registrar una categoria">
                      <i class="fa fa-2x fa-plus"></i>
                            </a>
                            <a href="{{ URL::to('/categorias/deleted') }}" class="btn btn-outline-danger btn-circle waves-effect hoverable" 
                    data-toggle="tooltip" data-placement="bottom" title="Categorias eliminadas">
                      <i class="fa fa-2x fa-recycle"></i>
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
                            <table id="dtcategorias" class="table table-borderless table-hover display dt-responsive nowrap" cellspacing="0" width="100%">
  <thead class="th-color white-text">
    <tr class="z-depth-2">
      <th class="th-sm">#
      </th>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Especialidad
      </th>
      <th class="th-sm">Categoria Padre
      </th>
      <th class="th-sm">Acciones
      </th>
   
    </tr>
  </thead>
  <tbody>
  @foreach($categorias as $key => $categoria)
    <tr class="hoverable">
      <td>{{$categoria->id}}</td>
      <td>{{$categoria->nombre}}</td>
      <td>
      <a href="{{ route('especialidades.show',$categoria->especialidad->id) }}" class="link-text"
                    data-toggle="tooltip" data-placement="bottom" title='Información de la especialidad "{{ $categoria->especialidad->nombre }}"'>
                      <i class="fa fa-balance-scale"></i> {{$categoria->especialidad->nombre}}</td>
                            </a>    
      <td>

            <td>
                    <a href="{{ route('categorias.show',$categoria->categoria->id) }}" class="link-text"
                                  data-toggle="tooltip" data-placement="bottom" title='Información de la categoria padre "{{ $categoria->categoria->nombre }}"'>
                                    <i class="fa fa-balance-scale"></i> {{$categoria->categoria->nombre}}</td>
                                          </a>    
                    <td>

<a href="{{ URL::to('categorias/' . $categoria->id) }}" class="text-primary m-1" 
                    data-toggle="tooltip" data-placement="bottom" title='Información de la categoria "{{ $categoria->nombre }}"'>
                      <i class="fa fa-2x fa-info-circle"></i>
                            </a>

      <a href="{{ URL::to('categorias/' . $categoria->id.'/edit') }}" class="text-warning m-1" 
                    data-toggle="tooltip" data-placement="bottom" title='Editar la categoria "{{ $categoria->nombre }}"'>
                      <i class="fa fa-2x fa-pencil-alt"></i>
                            </a>

                            <a onclick="eliminar_categoria({{ $categoria->id }},'{{ $categoria->nombre }}')" class="text-danger m-1" 
                    data-toggle="tooltip" data-placement="bottom" title='Eliminar la categoria "{{ $categoria->nombre }}"'>
                      <i class="fa fa-2x fa-trash-alt"></i>
                            </a>
                            <form id="eliminar{{ $categoria->id }}" method="POST" action="{{ URL::to('categorias/' . $categoria->id) }}" accept-charset="UTF-8">
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

function eliminar_categoria(id,nombre){
    swal({
  title: 'Eliminar categoria',
  text: '¿Desea eliminar la categoria "'+nombre+'"?',
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
$(document).ready(function() {
    var currentdate = new Date(); 
    moment.locale('es');
var datetime =  moment().format('DD MMMM YYYY, h-mm-ss a'); 
    var titulo_archivo = "Lista de categorias ("+datetime+")";
     $('#dtcategorias').DataTable( {
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
                        return 'Datos de categoria "'+ data[1]+'"';
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