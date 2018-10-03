@section('css_links')
<link rel="stylesheet" href="{{ asset('css/addons/select2.css') }}" type="text/css"/>
@endsection
@section('crud_form')

@if($editar)
<form method="POST" action="{{ URL::to('categorias/' . $categoria->id) }}" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="PUT">
    @else
    <form method="POST" action="{{ URL::to('categorias/') }}" accept-charset="UTF-8">
@endif

 {{ csrf_field() }}
    <!-- Grid row -->
    <div class="form-row">
        <!-- Grid column -->
        <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form">
    <i class="fa fa-sitemap prefix"></i>
    <input type="text" required id="nombre" value="{{ $categoria->nombre}}" name="nombre" class="form-control validate" maxlength="50">
    <label for="nombre" data-error="Error" data-success="Correcto">Nombre</label>
</div>
@if ($errors->has('nombre'))
                                            <div class="hoverable waves-light alert alert-danger alert-dismissible fade show" role="alert">
                                           {{ $errors->first('nombre') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                                
                                @endif
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form">
    <input type="text" required id="etiqueta" value="{{ $categoria->etiqueta}}" name="etiqueta" class="form-control validate" maxlength="5">
    <label for="etiqueta" data-error="Error" data-success="Correcto">Etiqueta</label>
</div>
@if ($errors->has('etiqueta'))
                                            <div class="hoverable waves-light alert alert-danger alert-dismissible fade show" role="alert">
                                           {{ $errors->first('etiqueta') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                                
                                @endif
        </div>
        <!-- Grid column -->
        </div>
    <!-- Grid row -->

  <!-- Grid row -->
  <div class="form-row">
        <!-- Grid column -->
        <div class="col-md-6">
            <!-- Material input -->
            
            <div class="md-form">
            <i class="fa fa-balance-scale"></i>
            <small for="tipo_categoria_id">Tipo de categoria</small>   
    <select class="form-control" required id="tipo_categoria_id" name="tipo_categoria_id">
    <option value="" disabled selected>Selecciona una opción</option>
    @foreach($tipos_categorias as $key => $tipo_categoria)
    <option value="{{$tipo_categoria->id}}">{{$tipo_categoria->nombre}}</option>
    @endforeach
</select>
</div> @if ($errors->has('tipo_categoria_id'))
                                            <div class="hoverable waves-light alert alert-danger alert-dismissible fade show" role="alert">
                                           {{ $errors->first('tipo_categoria_id') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                                
                                @endif
        </div>
        <!-- Grid column -->
        </div>
    <!-- Grid row -->

    <button type="submit" class="waves-effect btn {{($editar) ? 'btn-warning' : 'btn-success'}} btn-md hoverable">
    <i class="fa fa-2x {{($editar) ? 'fa-pencil-alt' : 'fa-plus'}}"></i> {{($editar) ? 'Editar' : 'Registrar'}}
    </button>
</form>
@endsection
@section('js_links')
<script type="text/javascript" src="{{ asset('js/addons/select2.min.js') }}"></script>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$('#tipo_categoria_id').select2({
        placeholder: "Tipos de categorias",
        theme: "material"
    });
    $(".select2-selection__arrow")
        .addClass("fa fa-chevron-down");
</script>
@endsection