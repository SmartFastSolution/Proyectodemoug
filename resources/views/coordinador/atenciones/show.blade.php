@extends('layouts.nav')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('coordinador.atencion.index') }}"><i class="fas fa-clipboard-list"></i> Atenciones</a></li>
<li class="breadcrumb-item active" aria-current="page"> {{ $id }}</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
@endsection
@section('atencion', 'active')
@section('productos', 'active')
@section('content')
@section('titulo', '| Detalle Atención')
<div>
	@livewire('coordinador.atencion.atencion-detalles', [$id])
</div>
@endsection

@section('js')
<script type="text/javascript">
	let coordenada = @json($atencion);
	const mapa = new Vue({
	  el: "#mapa",
	  data:{
		center: { lat: coordenada.latitud, lng: coordenada.longitud },
	}
	
	});
</script>

@endsection
