@if($categoria->id != $sub->id)
<option value="{{ $sub->id }}" {{($categoria->categoria->id == $sub->id ) ? 'selected' : '' }}>
@for($i=0; $i < 2*$niv; $i++)
&nbsp;&nbsp;&nbsp;&nbsp;
@endfor

{{ $sub->nombre }}
</option>
@if($sub->categorias->count())
        @foreach($sub->categorias as $sub2)
        @include('clasificacion.categorias.sub_categorias_options', array('sub'=> $sub2,'niv'=> $niv+1))
        @endforeach
        @endif

@endif