@if($categoria->id != $sub->id)
<option value="{{ $sub->id }}" {{ ((in_array($index, old('linea', []))) || ( ! Session::has('errors') && $linea->linea->id == $sub->id )) ? 'selected' : '' }}>
@for($i=0; $i < 2*$niv; $i++)
&nbsp;&nbsp;&nbsp;&nbsp;
@endfor

{{ $sub->nombre }}
</option>
@if($sub->->count())
        @foreach($sub->lineas as $sub2)
        @include('clasificacion.categorias.sub_categorias', array('sub'=> $sub2,'niv'=> $niv+1))
        @endforeach
        @endif

@endif