<?php

namespace App\Http\Controllers\Operador;

use App\Atencion;
use App\Http\Controllers\Controller;
use App\Sector;
use App\Requerimiento;
use Illuminate\Http\Request;
use App\TipoControl;
use Illuminate\Support\Facades\Auth;

class OperadorController extends Controller
{
   public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
	{
        $tipos = TipoControl::withcount('atenciones')->orderBy('atenciones_count','desc')->get();
        
        return view('coordinador.index', compact('tipos')); 
	}

    public function perfil()
    {
        $user = Auth::user();
        $sectores = Sector::where('estado', 'on')->get(['id', 'nombre']);
        // return $sectores;
        return view('perfil', compact('user', 'sectores'));
    }

	public function index1()
	{
        $atendidos      = Atencion::where('operador_id', Auth::id())->where('estado', 'iniciado')->count();
        $pendiente      = Atencion::where('operador_id', Auth::id())->where('estado', 'finalizado')->count();
        $total          = Atencion::where('operador_id', Auth::id())->count();
        $requerimientos = Atencion::where('operador_id', Auth::id())
        ->orderBy('id', 'asc')
        ->latest()
        ->take(5) 
        ->get(['id', 'detalle', 'observacion', 'accion']);
      return view('operador.index', compact('atendidos', 'pendiente', 'total', 'requerimientos'));  
	}

	public function perfil1()
    {
        $user = Auth::user();
        return view('operador.perfil.perfil', compact('user'));
    }
}
