@extends('template')

@section('headCSS')
<style>
    body {
        min-height: 100%;
        background: linear-gradient(135deg, #045397, #0b6cb8);
    }

    .login-container {
        padding: 4rem 1rem;
    }

    .login-title {
        color: #fff;
        font-weight: 600;
        margin-bottom: 2rem;
    }

    .login-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .login-card .card-body {
        padding: 2.5rem;
    }

    .form-group label {
        font-weight: 500;
        margin-bottom: .4rem;
    }

    .form-control {
        border-radius: 8px;
        padding: .6rem .75rem;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #045397;
    }

    .btn-log-reg {
        background-color: #E9580C !important;
        border-color: #E9580C !important;
        border-radius: 8px;
        padding: .55rem 2rem;
        font-weight: 500;
    }

    .btn-log-reg:hover {
        background-color: #d14f0a !important;
        border-color: #d14f0a !important;
    }

    .forgot-link {
        font-size: .9rem;
    }

    .form-check-label {
        font-size: .9rem;
    }
</style>
@endsection

@section('content')
<div class="login-container">
    <div class="text-center login-title">
        <h1>Login</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card login-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input
                                id="email"
                                type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                            >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input
                                id="password"
                                type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password"
                                required
                            >
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Remember Me --}}
                        <div class="form-group">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        {{-- reCAPTCHA --}}
                        <div class="form-group text-center mt-4 mb-1">
                            <div class="g-recaptcha d-inline-block"
                                 data-sitekey="{{ config('services.recaptcha.key') }}">
                            </div>
                        </div>
                        @if ($errors->has('g-recaptcha-response'))
                                <p class="invalid-feedback d-block my-2 mx-auto text-center">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </p>
                            @endif

                        {{-- Actions --}}
                        <div class="form-group text-center mb-0">
                            <button type="submit" class="btn btn-primary btn-log-reg">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <div class="mt-3">
                                    <a class="forgot-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
