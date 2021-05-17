<!-- Vertically Center -->
<div class="modal fade" id="modaldetalles" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modaldetallesLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h2 class="text-dark text-center font-weight-bold" v-if="datosget">Atencion #@{{ atencion.id }} </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="resetInput()">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <template v-if="datosget">
        <div>
              <div class="card">
                <div class="padding-20">
                  <h2 class="text-danger text-center font-weight-bold">ATENCIÓN</h2>
                  <ul  class="nav nav-tabs" id="myTab4" role="tablist">
                    <li class="nav-item">
                      <a wire:ignore class="nav-link active" id="atencion-datos-tab2" data-toggle="tab" href="#atencion-datos" role="tab" aria-selected="true">Datos</a>
                    </li>
                 
                    <li class="nav-item">
                      <a wire:ignore class="nav-link" id="atencion-archivos-tab2" data-toggle="tab" href="#atencion-archivos" role="tab" aria-selected="false"> Archivos</a>
                    </li>
                      <li class="nav-item">
                      <a wire:ignore class="nav-link" id="atencion-imagenes-tab2" data-toggle="tab" href="#atencion-imagenes" role="tab" aria-selected="false"> Imagenes</a>
                    </li>
                  </ul>
                  <div class="tab-content tab-bordered" id="myTab3Content">
                    <div class="tab-pane fade show active" id="atencion-datos" role="tabpanel" aria-labelledby="atencion-datos-tab2" wire:ignore.self>
                      <h3 class="text-center font-weight-bold text-danger">Datos</h3>
                      <div class="form-row">
                        <div class="form-group col-lg-12 col-sm-12">
                          <label for="">Detalles de Atención</label>
                          <textarea class="form-control" disabled="">@{{ atencion.detalle }}
                          </textarea>
                        </div>
                          <div class="form-group col-lg-12 col-sm-12">
                          <label for="">Acción</label>
                          <textarea class="form-control" disabled="">@{{ atencion.accion }}
                          </textarea>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                          <label for="">Observacion de Atención</label>
                          <div v-html="atencion.observacion">
                          </div>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                          <label for="">Fecha de Atención</label>
                          <input type="date" class="form-control" disabled :value="atencion.fecha_atencion ">
                        </div>
                         <div class="form-group col-lg-6 col-sm-12">
                          <label for="">Tipo de Atención</label>
                          <input type="text" class="form-control" v-if="atencion.tipo !== null" disabled :value="atencion.tipo.nombre ">
                        </div>
                      </div>
                    </div>
                  
                    <div class="tab-pane fade" id="atencion-archivos" role="tabpanel" aria-labelledby="atencion-archivos-tab2" wire:ignore.self>
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
                          <tr v-for="(a, ind) in atencion.documentos">
                             <td>@{{ a.nombre }}</td>
                            <td>@{{ a.extension }}</td>
                            <td width="25"><a target="_blank" :href="a.archivo" class="btn btn-primary"><i class="fa fa-download"></i></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                      <div class="tab-pane fade" id="atencion-imagenes" role="tabpanel" aria-labelledby="atencion-imagenes-tab2" >
                      <div class="row justify-content-center" v-if="img_atencion.length > 0">
                        <img class="image" v-for="(image, i) in img_atencion" :src="image" @click="onClick2(i)">
                        <vue-gallery-slideshow :images="img_atencion" :index="index2" @close="index2 = null"></vue-gallery-slideshow>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        </template>
      </div>
      <div class="modal-footer br">
        
      </div>
    </div>
  </div>
</div>