@extends('layouts.app')

@section('content')

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content cent-logo" src="images/cent-logo.png" alt="cent-logo" />
                </a>
            </div>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Ingat Saya') }}
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-cent">
                        {{ __('Masuk') }}
                    </button>
                    <div class="register-link m-t-15 text-center">
                        <p>
                            Tidak Punya Akun ?
                            <a href="{{ route('register') }}" class="signup-login-redirect">
                                Daftar Disini</a>
                        </p>
                        <a href="{{ route('password.request') }}" class="signup-forgotPassword">{{ __('Lupa Kata Sandi?') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection