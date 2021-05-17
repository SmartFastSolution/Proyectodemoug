<?php

namespace App\Http\Livewire\Coordinador\Atencion;

use App\Atencion;
use App\Exports\AtencionExport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Atenciones extends Component
{
	use WithPagination;
    use WithFileUploads;
	protected $paginationTheme = 'bootstrap';
	protected $queryString     =
	[
	'search' => ['except' => ''],
    'page',
    'status' => ['except' => ''],
	];
	public $perPage          = 10;
	public $search           = '';
	public $orderBy          = 'atencions.id';
	public $orderAsc         = true;
	public $status           = '';
    public $sector_id        ='';
	public $sectorSearch        ='';
	public $fechaini         = null;
	public $fechafin         = null;
	public $exporting        = false;
		public function mount()
	{
	$this->fechaini = date('Y-m-d');
    $this->fechafin = date('Y-m-d');	
	}
    public function render()
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

                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage); 
        return view('livewire.coordinador.atencion.atenciones', compact('atenciones'));
    }
        public function exportarExcel()
    {
        $this->exporting = true;
                $atenciones = Atencion::with(['tipo'])->leftJoin('sectors',  'sectors.id',  '=', 'atencions.sector_id',)
                    ->where(function ($query) {
                   $query->where('detalle', 'like', '%'.$this->search.'%')
                       ->orWhere('observacion', 'like', '%'.$this->search.'%');
                 })->where(function ($query) {
                   $query->where('detalle', 'like', '%'.$this->search.'%')
                       ->orWhere('observacion', 'like', '%'.$this->search.'%');
                 })
                       ->where(function ($query) {
                    if ($this->sectorSearch !== '') {
                       $query->where('sectors.nombre', 'like', '%'.$this->sectorSearch.'%');    
                    }
                 })
                ->whereBetween('fecha_atencion', [$this->fechaini , $this->fechafin])
                ->where(function ($query) {
                    if ($this->status !== '') {
                       $query->where('estado', $this->status);    
                    }
                 })
                ->select('atencions.*', 'sectors.nombre as sector')

                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->get(); 

                // dd($requerimientos[6]);

        return Excel::download(new AtencionExport($atenciones), date('d-m-y').'-atenciones.xlsx');
        $this->exporting = false;


    }
}
