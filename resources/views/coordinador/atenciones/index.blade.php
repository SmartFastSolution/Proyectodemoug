@extends('layouts.nav')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-store"></i> Atenciones</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
@endsection
@section('atencion', 'active')
@section('atenciones', 'active')
@section('content')
@section('titulo', '| Atenciones')
<div>
	<h1 class="text-danger text-center">Administración de Atenciones</h1>
	@livewire('coordinador.atencion.atenciones')
</div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
@endsection