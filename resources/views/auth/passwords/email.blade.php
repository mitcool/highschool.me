@extends('template')

@section('headCSS')
<style>
    body {
        min-height: 100%;
        background: linear-gradient(135deg, #045397, #0b6cb8);
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
<div class="container" style="margin-top: 75px; margin-bottom: 150px;">
    <div class="text-center mb-5 text-white">
        <h1>{{ __('Reset Password') }}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-log-reg">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
