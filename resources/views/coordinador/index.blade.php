@extends('layouts.nav')
@section('content')
<div class="row">
	<div class="col-12 col-md-6 col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4>Tipos de Plagas</h4>
			</div>
			<div class="card-body">
				<canvas id="myChart2"></canvas>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4>Tipos de Plagas</h4>
			</div>
			<div class="card-body">
				<canvas id="myChart3"></canvas>
			</div>
		</div>
	</div>
</div>

@endsection
@section('js')
  <script src="{{ asset('bundles/chartjs/chart.min.js') }}"></script>
<script type="text/javascript">
let tipos = @json($tipos);
let data = [];
let data1 = [];
let label = [];
let total = 0;

label.push('')
tipos.forEach(function(tipo) {
	if (tipo.atenciones_count > 0) {
		label.push(tipo.nombre+' ('+tipo.atenciones_count+')');
    	total += tipo.atenciones_count;
	} 
});

data1.push(0);
tipos.forEach(function(tipo) {
	if (tipo.atenciones_count > 0) {
	  let calculo = (tipo.atenciones_count * 100) /total;
      data.push(Number(calculo.toFixed(2)));
	  data1.push(tipo.atenciones_count);
	}  
 });

 var graphColors = [];
 var graphBorderColors = [];
 var internalDataLength = data1.length;
 i = 0;
 while (i <= internalDataLength) {
	 var randomR = Math.floor((Math.random() * 130) + 100);
	 var randomG = Math.floor((Math.random() * 130) + 100);
	 var randomB = Math.floor((Math.random() * 130) + 100);
   
	 var graphBackground = "rgba(" 
			 + randomR + ", " 
			 + randomG + ", " 
			 + randomB + ",0.2)";
	 graphColors.push(graphBackground); 
	 
	 var graphBorderColor = "rgba(" 
			 + randomR + ", " 
			 + randomG + ", " 
			 + randomB + ",1)";
	 graphBorderColors.push(graphBorderColor);
	 
   i++;
 };

var ctx = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
   data: {
       datasets: [{
           label: 'Bar Dataset',
           data: data1,
           borderColor: graphColors,
    	   backgroundColor: graphBorderColors,
           order: 2
       }, {
           label: 'Line Dataset',
           data: data1,
           type: 'line',
           // this dataset is drawn on top
           order: 1
       }],
       labels: label
   },
   options: {
	responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

var graphColors1 = [];
var graphBorderColors1 = [];
i = 0;
 while (i <= internalDataLength) {
	 var randomR = Math.floor((Math.random() * 130) + 100);
	 var randomG = Math.floor((Math.random() * 130) + 100);
	 var randomB = Math.floor((Math.random() * 130) + 100);
   
	 var graphBackground = "rgba(" 
			 + randomR + ", " 
			 + randomG + ", " 
			 + randomB + ",0.2)";
	 graphColors1.push(graphBackground); 
	 
	 var graphBorderColor = "rgba(" 
			 + randomR + ", " 
			 + randomG + ", " 
			 + randomB + ",1)";
	 graphBorderColors1.push(graphBorderColor);
	 
   i++;
 };


var ctx3 = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx3, {
  type: 'doughnut',
  data: {
	labels: label,
    datasets: [{
		label: 'LISTA DE REQUERIMIENTOS',
      	data: data,
		  backgroundColor:graphColors1,
          borderColor:graphBorderColors1,
      	borderWidth: 2
    }],
	hoverOffset: 4   
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
      display: false
    },
}
});

</script>
@endsection