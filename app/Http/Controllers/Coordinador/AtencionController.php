<?php

namespace App\Http\Controllers\Coordinador;

use App\Atencion;
use App\Http\Controllers\Controller;
use App\Requerimiento;
use App\Sector;
use App\TipoRequerimiento;
use App\User;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
	public function index()
	{
    	return view('coordinador.atenciones.index');	
	}
    public function show($id)
    {
        $atencion = Atencion::findOrfail($id);
        return view('coordinador.atenciones.show', compact('id', 'atencion'));  
    }
      
    public function datos($id)
    {
        $atencion = Atencion::with([
        'documentos', 
        'tipo',
        'sector',
        ])->find($id);
        $imagenes = $atencion->documentos->whereIn('extension',  ['png','jpeg', 'jpg'])->pluck('archivo');
        $atencionImg =[];
        if ($atencion->atencion) {
        $atencionImg = $atencion->atencion->documentos->whereIn('extension',  ['png','jpeg', 'jpg'])->pluck('archivo');
            
        }
              return response(array(
                        'success'          => true,
                        'atencion'         => $atencion,
                        'img_requerimient' => $imagenes,
                        'img_atencion'     => $imagenes
                    ),200,[]);
        // return $atencion;    
    }
}
