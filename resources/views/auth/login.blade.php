@extends('layouts.master_login')
@section('content')
<div class="mb-20">
    <h3>Socios</h3>
    <div class="text-muted font-weight-bold">Ingresa tus datos para iniciar sesión:</div>
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf


        <div class="form-group mb-5">
            <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group mb-5">
            <input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
            <div class="checkbox-inline">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Recuérdame
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>
            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
                {{ __('Login') }}
            </button>
            <a href="{{ asset('login/sing-in/facebook') }}" class="btn btn-secondary font-weight-bold px-9 py-4 my-3 mx-4">Ingresar con Facebook</a>
</form>
<div class="mt-10">
    <span class="opacity-70 mr-4">
        No tienes una cuenta?
    </span>
    <a href="{{ route('register') }}" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Registrate!</a>
</div>
                        
@endsection
        