@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<form method="POST" action="{{ route('password.update') }}" class="form" id="registerForm">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <h3>Reset Password</h3>
    <div class="input-group">
        <input type="text" name="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('Email Address') }}" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
        <ion-icon class="icon" name="mail"></ion-icon>
    </div>
    @error('email')
        <span class="error-message-register">{{ $message }}</span>
    @enderror

    <div class="input-group">
        <input type="text" id="registerPassword" class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}"  autocomplete="new-password">
        <ion-icon class="icon" id="toggleRegisterPassword" name="lock-closed"></ion-icon>
    </div>
    @error('password')
        <span class="error-message-register">{{ $message }}</span>
    @enderror

    <div class="input-group">
        <input type="text" id="confirmPassword" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
        <ion-icon class="icon" id="toggleConfirmPassword" name="lock-closed"></ion-icon>
    </div>
    @error('password_confirmation')
        <span class="error-message-register">{{ $message }}</span>
    @enderror


    <div class="btn-box">
        <button type="submit" class="button">{{ __('Reset Password') }}</button>
    </div>

    <div class="switch-button">
        <p>Already have an account?</p>
        <a href="{{ route('login') }}" id="showLoginForm">Login</a>
    </div>
</form>
<script>
    const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
    const registerPasswordField = document.getElementById('registerPassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordField = document.getElementById('confirmPassword');

    toggleRegisterPassword.addEventListener('click', function () {
        const type = registerPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        registerPasswordField.setAttribute('type', type);
        this.setAttribute('name', type === 'password' ? 'lock-closed' : 'lock-open');
    });

    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordField.setAttribute('type', type);
        this.setAttribute('name', type === 'password' ? 'lock-closed' : 'lock-open');
    });

    </script>
@endsection
