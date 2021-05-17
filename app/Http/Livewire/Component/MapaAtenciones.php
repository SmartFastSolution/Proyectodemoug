<?php

namespace App\Http\Livewire\Component;

use App\Atencion;
use Livewire\Component;
use Livewire\WithPagination;

class MapaAtenciones extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	protected $listeners       = ['obtenerMapas'];
	protected $queryString     =
	[
	'search' => ['except' => ''],
    'page', 
    'status' => ['except' => '']
	];
	
    public $perPage          = 100;
    public $search           = '';
    public $orderBy          = 'requerimientos.id';
    public $orderAsc         = true;
    public $estado           ='pendiente';
    public $status           = '';
    public $sector_id        ='';
    public $sectorSearch     ='';
    public $fechaini         = null;
    public $fechafin         = null;
    public $conteo           = 0;
    public $rango            = 100;
    public $requerimiento_id ='';
    public $editMode         = false;
    public $createDisabled   = false;
	public $magnitud_medida, $unidad_medida, $icono_medida, $descripcion_medida;
    public function mount()
  {
  	$this->fechaini = date('Y-m-d');
    $this->fechafin = date('Y-m-d');  
  }
    public function render()
    {
    	$this->obtenerMapas();
        return view('livewire.component.mapa-atenciones');
    }
     public function obtenerMapas()
    {
    $atenciones = Atencion::leftJoin('sectors',  'sectors.id',  '=', 'atencions.sector_id',)
->where(function ($query) {
                   $query->where('detalle', 'like', '%'.$this->search.'%')
                       ->orWhere('observacion', 'like', '%'.$this->search.'%');
                 })
                ->whereBetween('fecha_atencion', [$this->fechaini , $this->fechafin])
                ->where(function ($query) {
                    if ($this->status !== '') {
                       $query->where('estado', $this->status);    
                    }
                 })
                    ->where(function ($query) {
                    if ($this->sectorSearch !== '') {
                       $query->where('sectors.nombre', 'like', '%'.$this->sectorSearch.'%');    
                    }
                 })

                ->select('atencions.*', 'sectors.nombre as sector')
                
              	->latest('atencions.id')
               	->take($this->rango)
               	->get();

               $this->conteo = $atenciones->count();
     	$this->emit('mapas',['mapas' => $atenciones]);

    }
}
