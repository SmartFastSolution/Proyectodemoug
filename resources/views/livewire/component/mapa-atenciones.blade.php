<div class="container-fluid">
    <h3 class=" font-weight-bold text-danger"> N° Atenciones: <span class="text-dark">{{ $conteo }}</span> </h3>
    <div class="row">
        <div class="col-lg-12 bg-light">
            <div class="form-row">
                <div class="form-group col-lg-3">
                    <label for="">Encuentre un Atención</label>
                    <input type="text" class="form-control" wire:model="search" placeholder="Buscar Atencion">
                </div>
                   <div class="form-group col-lg-2">
                    <label for="">Sector</label>
                    <input type="text" class="form-control" wire:model="sectorSearch" placeholder="Buscar Sector">
                </div>
                
                <div class="form-group col-lg-3">
                    <label for="formControlRange">Selecciona un rango de Atenciones</label>
                    <input type="range" wire:model="rango" min="100" max="10000" step="100" class="form-control-range" id="formControlRange">
                    <small class="text-danger">{{ $rango }}</small>
                </div>
                <div class="col-lg-2 col-sm-12 mt-2">
                    <strong>Fecha Inicio</strong>
                    <input wire:model="fechaini" type="date" class="form-control p-2" placeholder="Buscar Atenciones...">
                </div>
                <div class="col-lg-2 col-sm-12 mt-2">
                    <strong>Fecha Fin</strong>
                    <input wire:model="fechafin" type="date" class="form-control p-2" placeholder="Buscar Atenciones...">
                </div>
            </div>
        </div>
        {{--       <div class="col-lg-4 mt-2">
            <div class="bg-warning p-1">
                <h6 class="text-center text-light">Atenciones ({{ $conteo }})</h6>
            </div>
            <div>
                
            </div>
        </div> --}}
        <div class="col-lg-12 mt-2" id="mapa" wire:ignore>
            @include('component.modales.modalview')
            <gmap-map
                {{-- map-type-id="terrain" --}}
                :center="center"
                :zoom="13"
                style="width:100%;  height: 650px;"
                >
                </gmap-info-window> --}}
                <gmap-marker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    {{-- @click="center=m.position" --}}
                    :icon="m.img"
                    :clickable="true"
                    @click="cargarAtencion(m.atencion_id,index)"
                ></gmap-marker>
            </gmap-map>
        </div>
    </div>
</div>