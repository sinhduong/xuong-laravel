@extends('layouts.auth')

@section('content')
<form action="{{ route('login') }}" method="POST" class="form" id="loginForm">
    @csrf
    <h3>Login</h3>

    <div class="input-group">
        <input type="text" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}">
        <ion-icon class="icon" name="mail"></ion-icon>
    </div>

    <div class="input-group">
        <input type="password" id="passWordField" class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" autocomplete="current-password">
        <ion-icon class="icon" id="toggLePassword" name="lock-closed"></ion-icon>
    </div>

    <!-- Hiển thị lỗi chung -->
    @if($errors->any())
    <span class="error-message">
        {{ $errors->first() }}
    </span>
    @endif

    <div class="button">
        <div class="remember">
            <input type="checkbox" name="remember" id="rememberMe" class="checkbox">
            <p>Remember</p>
        </div>
        <a href="{{ route('password.request') }}"><p>Forgot password?</p></a>
    </div>

    <div class="btn-box">
        <button class="button" type="submit"> {{ __('Login') }}</button>
    </div>

    <div class="switch-button">
        <p>Don't have an account?</p>
        <a href="{{ route('register') }}" id="showRegisterForm">Register</a>
    </div>
</form>


<script>
    const togglePassword = document.getElementById('toggLePassword');
const passwordField = document.getElementById('passWordField');


togglePassword.addEventListener('click', function () {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.setAttribute('name', type === 'password' ? 'lock-closed' : 'lock-open');
});


</script>
@endsection

