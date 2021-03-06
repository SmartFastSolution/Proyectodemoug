<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function verificarEstado($user)
    {
       $datos = User::selectRaw('timestampdiff(DAY, activated_at, curdate()) as dato')->where('id', $user->id)->first();
       if ($datos->dato >= 12) {
          $user->estado = 'off';
          $user->save();
       }
      
    }
    // public function redirectTo()
    // {
      
    // }


    public function authenticated($request , $user){

      $this->verificarEstado($user);
  if ($user->estado == 'off') {

    Auth::guard()->logout();

    $request->session()->invalidate();

    return redirect('/login')->withInput()->with('message', 'Tu cuenta esta desactivada por favor comunicate con el administrador');
  }

  $user->access_at = Carbon::now();
  $user->save();

    if($user->hasRole('operador')){
        return redirect()->route('operador.index');
    }elseif ($user->hasRole('admin') or $user->hasRole('super-admin')) {
        return redirect()->route('admin.index');
    }elseif($user->hasRole('coordinador')){
        return redirect()->route('coordinador.index');
    }

   }

       protected function credentials(Request $request)
    {
        $login = $request->input($this->username());
        // Comprobar si el input coincide con el formato de E-mail
            $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $field => $login,
                'password' => $request->input('password')
            ];
        }
        public function username()
        {
            return 'login';
        }
}
