<?php

namespace App\Http\Controllers\Coordinador;

use App\Atencion;
use App\Http\Controllers\Controller;
use App\Requerimiento;
use App\Sector;
use App\TipoControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinadorController extends Controller
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
    public function mapa()
    {
        return view('coordinador.mapa.index'); 
    }
     public function calendario()
    {
         $atenciones = Atencion::leftJoin('tipo_controls',  'tipo_controls.id',  '=', 'atencions.tipo_control_id')
         ->select('atencions.fecha_atencion as date', 'atencions.estado', 'tipo_controls.nombre as title', 'atencions.id')
                ->orderBy('atencions.created_at','desc')
                // ->whereDate('fecha_maxima', now())
                // ->where('user_id', Auth::id())
                ->get();
        // $atenciones = Requerimiento::select('fecha_maxima as date', 'nombres as title')
        //         ->orderBy('created_at','desc')
        //         // ->whereDate('fecha_maxima', now())
        //         ->get();

                // return $atenciones;
        return view('coordinador.calendario.index', compact('atenciones')); 
    }
}
