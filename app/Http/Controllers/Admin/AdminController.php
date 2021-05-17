<?php

namespace App\Http\Controllers\Admin;

use App\Atencion;
use App\Http\Controllers\Controller;
use App\Requerimiento;
use App\Sector;
use App\TipoRequerimiento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {
        $usuarios      = User::count();
        $activos       = User::where('estado', 'on')->count();
        $coordinadores = User::role('coordinador')->where('estado', 'on')->count();
        $atendidos     = Atencion::count();
        return view('admin.index', compact('usuarios','activos','coordinadores', 'atendidos')); 
    }
    public function perfil()
    {
        $user = Auth::user();
        return view('admin.users.perfil', compact('user'));
    }
}
