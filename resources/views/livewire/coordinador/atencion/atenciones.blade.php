<div>
	
	<button type="button" class="btn btn-success mb-2" wire:click.prevent="exportarExcel">Exportar <i class="fas fa-file-excel"></i> </button>
	
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body p-0">
					<div class="row p-2 justify-content-center">
						<div class="col-lg-2 col-sm-12 mt-2">
							<input wire:model.debounce.300ms="search" type="text" class="form-control p-2" placeholder="Buscar atenciones...">
						</div>
						<div class="col-lg-2 col-sm-12 mt-2">
							<input wire:model.debounce.300ms="sectorSearch" type="text" class="form-control p-2" placeholder="Buscar Sector...">
						</div>
						<div class="col-lg-2 col-sm-12 mt-2">
							<select wire:model="orderBy" class="custom-select " id="grid-state">
								<option value="atencions.id">ID</option>
								<option value="atencions.fecha_atencion">Fecha de Atención</option>
							</select>
							
						</div>
						<div class="col-lg-2 col-sm-12 mt-2">
							<select wire:model="orderAsc" class="custom-select " id="grid-state">
								<option value="1">Ascendente</option>
								<option value="0">Descenente</option>
							</select>
							
						</div>
						<div class="col-lg-2 col-sm-12 mt-2">
							<input wire:model.debounce.300ms="status" type="text" class="form-control p-2" placeholder="Buscar estado">
						</div>
						<div class="col-lg-1 col-sm-12 mt-2">
							<select wire:model="perPage" class="custom-select " id="grid-state">
								<option>10</option>
								<option>50</option>
								<option>100</option>
								<option>300</option>
								<option>500</option>
							</select>
							
						</div>
					</div>
					<div class="row justify-content-center p-2 form-inline">
						<div class="col-lg-3 col-sm-12 mt-2">
							<strong>Fecha Inicio</strong>
							<input wire:model="fechaini" type="date" class="form-control p-2">
						</div>
						<div class="col-lg-3 col-sm-12 mt-2">
							<strong>Fecha Fin</strong>
							<input wire:model="fechafin" type="date" class="form-control p-2">
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead class="">
								<tr class="">
									{{-- <th class="px-4 py-2 ">Codigo</th> --}}
									<th class=" text-center">ID</th>
									<th class=" text-center">Operador</th>
									<th class=" text-center">Fecha de atención</th>
									<th class=" text-center">Tipo de Control</th>
									<th class=" text-center">Sector</th>
									<th class=" text-center ">Estado</th>
									<th class=" text-center ">Acción</th>
								</tr>
							</thead>
							<tbody class="text-center">
								@if ($atenciones->isNotEmpty())
								@foreach($atenciones as $atencion)
								<tr>
									<td class="text-center">{{ $atencion->id }}</td>
									<td class="text-center"> {{ $atencion->operador->nombres }}</td>
									<td class="text-center">{{ Carbon\Carbon::parse($atencion->fecha_atencion)->formatLocalized('%d de %B %Y ')}}</td>
									<td class="text-center">{{ $atencion->tipo->nombre }}</td>
									<td class="text-center">{{ $atencion->sector }}</td>
									<td class="text-center">{{ $atencion->estado }}</td>
									<td class="text-center">
										<a href="{{ route('coordinador.atencion.show', $atencion->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</td>
								
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="10"><p class="text-center">No hay resultado para la busqueda <strong>{{ $search }}</strong> en la pagina <strong>{{ $page }}</strong> al mostrar <strong>{{ $perPage }} </strong> por pagina </p></td>
								</tr>
								
								@endif
							</tbody>
							
						</table>
					</div>
					<div class=" row justify-content-center">
						{!! $atenciones->links() !!}
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>