<!DOCTYPE html>
<html lang="es">
  <!-- Copied from http://radixtouch.in/templates/admin/aegis/source/light/auth-login.html by Cyotek WebCopy 1.7.0.600, Saturday, September 21, 2019, 2:51:57 AM -->
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Inicio de Sesion</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('bundles/bootstrap-social/bootstrap-social.css') }}"> --}}
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/components.css') }}"> --}}
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='img/favicon.ico'>
  </head>
  <body>
    <div class="loader"></div>
    <div id="app">
      <section class="section">
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
          <div class="card card0 border-0">
            <div class="row d-flex">
              <div class="col-lg-6">
                <div class="card1 pb-5">
                  <div class="row"> <img src="{{ asset('img/ug.png') }}" class="logo"> 
                  </div>
                  <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset('img/inicio1.jpeg') }}" class="image"> 
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="font-weight-boldtext-center mt-5 text-danger">INGRESO AL SISTEMA</h5>
                    <div class="row px-3"> 
                      <label class="mb-1">
                      <h6 class="mb-0 text-sm">Correo o usuario</h6>
                    </label> 
                    <input id="login" type="login" placeholder="Correo o usuario" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                    @error('login')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="row px-3"> <label class="mb-1">
                    <h6 class="mb-0 text-sm">Contraseña</h6>
                  </label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="Ingresa Contraseña">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="row px-3 mb-4">
                  <div class="custom-control custom-checkbox custom-control-inline"> <input  type="checkbox" name="remember" id="chk1" {{ old('remember') ? 'checked' : '' }} class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Recordar</label>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">Olvidaste tu contraseña?</a>
                @endif
              </div>
              <div class="row mb-3 px-3">
                <button type="submit" class="btn btn-blue text-center">Iniciar Sesión</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="bg-blue py-4">
        <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. Todos los derechos reservados.</small>
          <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('js/app.min.js') }}"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
{{-- <script src="{{ asset('js/scripts.js') }}"></script> --}}
<!-- Custom JS File -->
{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
</body>
</html>