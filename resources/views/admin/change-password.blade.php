@extends('admin_template')

@section('css')
<style>
    .cp-page .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }

    .cp-card {
        width: 100%;
        border: 0;
        border-radius: 14px;
        box-shadow: 0 15px 40px rgba(0,0,0,.12);
        overflow: hidden;
    }

    .cp-card .card-body {
        padding: 2rem;
    }

    .cp-card label {
        font-weight: 600;
        margin-bottom: .45rem;
        color: #1d2a3a;
    }

    .cp-card .form-control {
        width: 100% !important;
        display: block !important;
        border-radius: 10px;
        padding: .65rem .8rem;
    }

    .cp-card .form-control:focus {
        box-shadow: none;
        border-color: #045397;
    }

    .btn-cp {
        background: #E9580C !important;
        border-color: #E9580C !important;
        border-radius: 10px;
        padding: .65rem 1.5rem;
        font-weight: 600;
        width: 100%;
    }

    .btn-cp:hover {
        background: #d14f0a !important;
        border-color: #d14f0a !important;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="text-center mt-5 mb-5">
        <h1>Change Password</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-7 col-xl-5">
            <div class="card cp-card">
                <div class="card-body">

                    @if(session('status'))
                        <div class="alert alert-success mb-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.update-password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input id="current_password" type="password"
                                   class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}"
                                   name="current_password" required>
                            @if ($errors->has('current_password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input id="password_confirmation" type="password"
                                   class="form-control"
                                   name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-cp mt-2">
                            Update Password
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection