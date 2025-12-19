@extends('template')

@section('headCSS')
<style>
    body {
        min-height: 100%;
        background: linear-gradient(135deg, #045397, #0b6cb8);
    }

    .register-container {
        padding: 4rem 1rem;
    }

    .register-title {
        color: #fff;
        font-weight: 600;
        margin-bottom: 2rem;
    }

    .register-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .register-card .card-body {
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

    .btn-log {
        border-radius: 8px;
        border: 1px solid #045397 !important;
        color: #045397;
        font-weight: 500;
        padding: .55rem 1.5rem;
    }

    .btn-log:hover {
        background-color: #045397;
        color: #fff;
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
</style>
@endsection

@section('content')
<div class="register-container">
    <div class="text-center register-title">
        <h1>Register</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card register-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Family Name --}}
                        <div class="form-group">
                            <label for="surname">{{ __('Family Name') }}</label>
                            <input id="surname" type="text"
                                   class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                   name="surname" value="{{ old('surname') }}" required>
                            @if ($errors->has('surname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Role --}}
                        <div class="form-group">
                            <label for="role_id">I'm a</label>
                            <select name="role_id" class="form-control" id="role_id">
                                @foreach ($user_roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password"
                                   class="form-control" name="password_confirmation" required>
                        </div>

                        {{-- reCAPTCHA --}}
                        <div class="form-group text-center mt-4 mb-4">
                            <div class="g-recaptcha d-inline-block"
                                 data-sitekey="{{ config('services.recaptcha.key') }}">
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="form-group text-center mb-0">
                            <a href="{{ route('login') }}" class="btn btn-log mr-2">
                                {{ __('I have an account') }}
                            </a>
                            <button type="submit" class="btn btn-primary btn-log-reg">
                                {{ __('Register') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
