<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AtencionExport implements FromView
{
   	use Exportable;
    protected $atenciones;
    
    public function __construct($atenciones)
    {
        $this->atenciones = $atenciones;
    }
   

   public function view(): View
   {
             return view('Reportes.coordinador.atenciones',[
                 'atenciones' => $this->atenciones
             ]);
   }
}
