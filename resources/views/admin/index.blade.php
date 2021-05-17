@extends('layouts.nav')

@section('css')
  <style type="text/css">
    
  </style>
@endsection
@section('content')
<div class="row ">
  <div class="col-xl-4 col-lg-6">
    <div class="card l-bg-red">
      <div class="card-statistic-3">
        <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
        <div class="card-content">
          <h4 class="card-title">Usuarios Registrados</h4>
          <span class="font-weight-bold text-center" style="font-size: 40px">{{ $usuarios }}</span>
         {{--  <div class="progress mt-1 mb-1" data-height="10">
            <div class="progress-bar l-bg-purple" role="progressbar"  data-width="{{ ($activos * 100) / $usuarios }}%" aria-valuenow="{{ ($activos * 100) / $usuarios }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mb-0 text-sm">
            @if ($calculo2 = ($activos * 100) / $usuarios > 0)
            <span class="text-nowrap">Tienes el {{ number_format(($activos * 100) / $usuarios, 2) }}% de usuarios activos</span>
            @else
            <span class="text-nowrap">Todos los usuarios estan activos </span>
            @endif
            
          </p> --}}
        </div>
      </div>
    </div>
  </div>
    <div class="col-xl-4 col-lg-6">
    <div class="card l-bg-yellow">
      <div class="card-statistic-3">
        <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
        <div class="card-content">
          <h4 class="card-title">Coordiandores</h4>
          <span class="font-weight-bold text-center" style="font-size: 40px">{{ $coordinadores }}</span>
      {{--     <div class="progress mt-1 mb-1" data-height="10">
            <div class="progress-bar l-bg-purple" role="progressbar"  data-width="{{ ($coordinadores * 100) / $usuarios }}%" aria-valuenow="{{ ($coordinadores * 100) / $usuarios }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mb-0 text-sm">
            @if ($calculo2 = ($coordinadores * 100) / $usuarios > 0)
            <span class="text-nowrap">Tienes el {{ number_format(($coordinadores * 100) / $usuarios, 2) }}% de usuarios coordinador</span>
            @else
            <span class="text-nowrap">Todos los usuarios son coordinadores </span>
            @endif
            
          </p> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6">
        <div class="card l-bg-green">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-list-alt"></i></div>
                <div class="card-content">
                    <h4 class="card-title">Atenciones</h4>
                    <span class="font-weight-bold text-center" style="font-size: 40px">{{ $atendidos }}</span>
              
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
  <script src="{{ asset('bundles/chartjs/chart.min.js') }}"></script>

   
@endsection