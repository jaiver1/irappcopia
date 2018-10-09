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
        <small for="raiz">Categoria Raiz</small>   
        <label class="bs-switch">
                <input {{ $categoria->categoria->id == -1  ? "checked" : ""}} type="checkbox">
                <span class="slider round"></span>
              </label>
</div> @if ($errors->has('raiz'))
                                        <div class="hoverable waves-light alert alert-danger alert-dismissible fade show" role="alert">
                                       {{ $errors->first('raiz') }}
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
            <i class="fa fa-balance-scale"></i>
            <small for="especialidad_id">Especialidades</small>   
    <select class="form-control" required id="especialidad_id" name="especialidad_id">
    <option value="" disabled selected>Selecciona una opción</option>
    @foreach($especialidades as $key => $especialidad)
    <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>
    @endforeach
</select>
</div> @if ($errors->has('especialidad_id'))
                                            <div class="hoverable waves-light alert alert-danger alert-dismissible fade show" role="alert">
                                           {{ $errors->first('especialidad_id') }}
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
$('#especialidad_id').select2({
        placeholder: "Especialidades",
        theme: "material"
    });
    $(".select2-selection__arrow")
        .addClass("fa fa-chevron-down");
</script>
@endsection
