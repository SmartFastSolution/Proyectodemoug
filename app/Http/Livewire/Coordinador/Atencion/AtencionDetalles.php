<?php

namespace App\Http\Livewire\Coordinador\Atencion;

use App\Atencion;
use Livewire\Component;

class AtencionDetalles extends Component
{
	public $atencion_id;
	public $atencion;
	public function mount($id)
	{
        $this->atencion_id = $id;
		

	}
    public function render()
    {
    	 $this->atencion = Atencion::with([
        'documentos',])->find($this->atencion_id);

        return view('livewire.coordinador.atencion.atencion-detalles');
    }
}
