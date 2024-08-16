@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('register') }}" class="form" id="registerForm">
    @csrf
    <h3>Register</h3>

    <div class="input-group">
        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}" >
        <ion-icon class="icon" name="person"></ion-icon>
    </div>
    @error('name')
        <span class="error-message-register">{{ $message }}</span>
    @enderror

    <div class="input-group">
        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" >
        <ion-icon class="icon" name="mail"></ion-icon>
    </div>
    @error('email')
        <span class="error-message-register">{{ $message }}</span>
    @enderror

    <div class="input-group">
        <input type="text" id="registerPassword" name="password" placeholder="Password" value="{{ old('password') }}">
        <ion-icon class="icon" id="toggleRegisterPassword" name="lock-closed"></ion-icon>
    </div>
    @error('password')
        <span class="error-message-register">{{ $message }}</span>
    @enderror

    <div class="input-group">
        <input type="text" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
        <ion-icon class="icon" id="toggleConfirmPassword" name="lock-closed"></ion-icon>
    </div>
    @error('password_confirmation')
        <span class="error-message-register">{{ $message }}</span>
    @enderror


    <div class="btn-box">
        <button type="submit" class="button">Register</button>
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
