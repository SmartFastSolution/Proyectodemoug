@extends('layouts.nav')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-clipboard-list"></i> Tipos de Control</li>
@endsection
@section('content')
@section('tipos-registro', 'active')
@section('titulo', '| Tipos Requerimientos')
<div>
	<h1 class="text-danger text-center">Tipos de Control</h1>
	@livewire('admin.tipo-control.requerimientos')

</div>
@endsection