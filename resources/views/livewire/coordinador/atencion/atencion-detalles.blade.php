<div class="row mt-sm-4">
	<div class="col-12 col-md-12 col-lg-4">
		<div class="card">
			<div class="card-header">
				<h4>Datos de la Atención</h4>
			</div>
			<div class="card-body">
				<div >
					<p class="clearfix">
						<span class="float-left">
							Estado
						</span>
						<span class="float-right text-capitalize badge @if ($atencion->estado == 'pendiente')
							badge-danger
							@elseif ($atencion->estado == 'asignado')
							badge-warning
							@else
							badge-success
							@endif">
							{{ $atencion->estado }}
						</span>
					</p>
					@if ($atencion->estado == 'on' || $atencion->estado == 'al')
					<p class="clearfix">
						<span class="float-left">
							Fecha Atención
						</span>
						<span class="float-right text-muted">
							{{ $atencion->fecha_atencion }}
						</span>
					</p>
					@endif
					@isset ($atencion->operador->nombres)
					<p class="clearfix">
						<span class="float-left">
							Operador
						</span>
						<span class="float-right text-muted">
							{{ $atencion->operador->nombres }}
						</span>
					</p>
					@endisset
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-12 col-lg-8">
		<div class="card" style="height: 500px">
			<div class="padding-20">
				<ul  class="nav nav-tabs" id="myTab4" role="tablist">
					<li class="nav-item">
						<a wire:ignore class="nav-link active" id="datos-tab2" data-toggle="tab" href="#datos" role="tab" aria-selected="true">Datos</a>
					</li>
					<li class="nav-item">
						<a wire:ignore class="nav-link" id="observacion-tab2" data-toggle="tab" href="#observacion" role="tab" aria-selected="true">Observación</a>
					</li>
					<li class="nav-item">
						<a wire:ignore class="nav-link" id="geolocalizacion-tab2" data-toggle="tab" href="#geolocalizacion" role="tab" aria-selected="true">Geolocalización</a>
					</li>
					<li class="nav-item">
						<a wire:ignore class="nav-link" id="archivos-tab2" data-toggle="tab" href="#archivos" role="tab" aria-selected="false"> Archivos</a>
					</li>
				</ul>
				<div class="tab-content tab-bordered" id="myTab3Content">
					<div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab2" wire:ignore.self>
						<h3 class="text-center font-weight-bold text-danger">Datos</h3>
						<div class="form-row">
							<div class="form-group col-lg-12 col-sm-12">
								<label for="">Detalle</label>
								<textarea name="" id="" disabled=""  cols="30" rows="10" class="form-control">{{ $atencion->detalle }}</textarea>
							</div>
							<div class="form-group col-lg-12 col-sm-12">
								<label for="">Acción</label>
								<textarea name="" id=""  disabled="" cols="30" rows="10" class="form-control">{{ $atencion->accion }}</textarea>
							</div>
							<div class="form-group col-lg-6 col-sm-12">
								<label for="">Fecha de Atención</label>
								<input type="date" class="form-control" disabled value="{{ $atencion->fecha_atencion }}">
							</div>
							<div class="form-group col-lg-6 col-sm-12">
								<label for="">Tipo de Atención</label>
								<input type="text" class="form-control" disabled value="{{ $atencion->tipo->nombre }}">
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="observacion" role="tabpanel" aria-labelledby="observacion-tab2" wire:ignore.self>
						<h3 class="text-center font-weight-bold text-danger">Observaciones</h3>
						{!! $atencion->observacion !!}
					</div>
					<div class="tab-pane fade " id="geolocalizacion" role="tabpanel" aria-labelledby="geolocalizacion-tab2" wire:ignore.self>
						<h3 class="text-center font-weight-bold text-danger">Geolocalización</h3>
						<div id="mapa" wire:ignore>
							<gmap-map
								:center="center"
								:zoom="12"
								style="width:100%;  height: 350px;"
								>
								<gmap-marker
									:position="center"
									icon="https://maps.google.com/mapfiles/kml/paddle/grn-circle.png"
								></gmap-marker>
							</gmap-map>
						</div>
					</div>
					<div class="tab-pane fade" id="archivos" role="tabpanel" aria-labelledby="archivos-tab2" wire:ignore.self>
						<h3 class="text-center font-weight-bold text-danger">Archivos</h3>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Extension</th>
									<th colspan="2">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($atencion->documentos as $documento)
								<tr>
									<td>{{ $documento->nombre }}</td>
									<td>{{ $documento->extension }}</td>
									<td width="25"><a target="_blank" href="{{ $documento->archivo }}" class="btn btn-primary"><i class="fa fa-download"></i></a></td>
									<td width="25"><a href="" class="btn btn-danger" wire:click.prevent="$emit('eliminarRegistro','Seguro que deseas eliminar este Archivo?','eliminarDocumento', {{ $documento->id }})" ><i class="fa fa-trash"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>