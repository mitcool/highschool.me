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

    .login-pin-group {
        display: none;
    }

    .login-response {
        display: none;
        border-radius: 8px;
        padding: .75rem 1rem;
        font-size: .95rem;
        margin-bottom: 1rem;
    }

    .login-response.is-error {
        display: block;
        background: #fce8e6;
        color: #b42318;
    }

    .login-response.is-success {
        display: block;
        background: #e8f5e9;
        color: #1b5e20;
    }

    .login-loading {
        display: none;
        align-items: center;
        justify-content: center;
        gap: .65rem;
        color: #045397;
        font-size: .95rem;
        font-weight: 500;
        margin: 1rem 0 0.5rem;
    }

    .login-loading-spinner {
        width: 18px;
        height: 18px;
        border: 2px solid rgba(4, 83, 151, 0.18);
        border-top-color: #045397;
        border-radius: 50%;
        animation: login-spin .7s linear infinite;
    }

    @keyframes login-spin {
        to {
            transform: rotate(360deg);
        }
    }

    .login-pin-hint {
        display: none;
        margin-top: -.35rem;
        margin-bottom: 1rem;
        text-align: center;
        color: #045397;
        font-size: .92rem;
        font-weight: 500;
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
                    <form method="POST" action="{{ route('login') }}" id="ajax-login-form">
                        @csrf
                        <div id="login-response" class="login-response"></div>

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

                        <div class="form-group login-pin-group" id="login-pin-group">
                            <label for="login_pin" class="mb-0">PIN Code</label>
                            <input
                                id="login_pin"
                                type="text"
                                class="form-control{{ $errors->has('login_pin') ? ' is-invalid' : '' }}"
                                name="login_pin"
                                value="{{ old('login_pin') }}"
                                inputmode="numeric"
                                pattern="[0-9]*"
                                maxlength="6"
                            >
                            <input type="hidden" name="verification_token" id="verification_token" value="{{ old('verification_token') }}">
                            @if ($errors->has('login_pin'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('login_pin') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="login-pin-hint" class="login-pin-hint">
                            Check your email for the PIN code.
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

                        <div id="login-loading" class="login-loading">
                            <span class="login-loading-spinner"></span>
                            <span id="login-loading-text">Checking your login details...</span>
                        </div>

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

@section('footerScripts')
<script>
    $(function () {
        const loginForm = $('#ajax-login-form');
        const loginResponse = $('#login-response');
        const loginPinGroup = $('#login-pin-group');
        const verificationTokenInput = $('#verification_token');
        const loginPinInput = $('#login_pin');
        const submitButton = loginForm.find('button[type="submit"]');
        const loginLoading = $('#login-loading');
        const loginLoadingText = $('#login-loading-text');
        const loginPinHint = $('#login-pin-hint');

        function showMessage(message, type) {
            loginResponse
                .removeClass('is-error is-success')
                .addClass(type === 'success' ? 'is-success' : 'is-error')
                .html(message);
        }

        function showLoading(text) {
            loginLoadingText.text(text || 'Checking your login details...');
            loginLoading.css('display', 'flex');
        }

        function hideLoading() {
            loginLoading.hide();
        }

        function clearFieldErrors() {
            loginForm.find('.is-invalid').removeClass('is-invalid');
            loginForm.find('.ajax-field-error').remove();
        }

        function showFieldErrors(errors) {
            $.each(errors, function (field, messages) {
                const input = loginForm.find('[name="' + field + '"]');
                if (!input.length) {
                    return;
                }

                input.addClass('is-invalid');
                $('<span class="invalid-feedback d-block ajax-field-error"><strong>' + messages[0] + '</strong></span>')
                    .insertAfter(input.last());
            });
        }

        function showPinField(token, message) {
            loginPinGroup.slideDown(150);
            loginPinHint.slideDown(150);
            verificationTokenInput.val(token || '');
            if (message) {
                showMessage(message, 'success');
            }
            submitButton.text('Verify & Login');
            loginPinInput.trigger('focus');
        }

        loginForm.on('submit', function (e) {
            e.preventDefault();

            clearFieldErrors();
            loginResponse.hide().removeClass('is-error is-success').text('');
            submitButton.prop('disabled', true);
            showLoading(loginPinGroup.is(':visible') ? 'Verifying your PIN...' : 'Checking your login details...');

            $.ajax({
                url: loginForm.attr('action'),
                method: 'POST',
                data: loginForm.serialize(),
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function (response) {
                    if (response.status === 'pin_required') {
                        hideLoading();
                        showPinField(response.verification_token, response.message);
                        return;
                    }

                    if (response.status === 'success' && response.redirect) {
                        showLoading('Login successful. Redirecting...');
                        window.location.href = response.redirect;
                    }
                },
                error: function (xhr) {
                    hideLoading();
                    const response = xhr.responseJSON || {};
                    const errors = response.errors || {
                        email: ['Unable to complete login. Please try again.']
                    };

                    if (response.pin_required) {
                        showPinField(response.verification_token, '');
                    }

                    showFieldErrors(errors);
                },
                complete: function () {
                    if (!window.location.href || !document.hidden) {
                        hideLoading();
                    }
                    submitButton.prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection
