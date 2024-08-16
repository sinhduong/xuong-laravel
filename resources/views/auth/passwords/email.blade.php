@extends('layouts.auth')
@section('content')
<style>
.alert {
            padding: 15px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 5px;
            color: #fff;
            background-color: #28a745; /* Green background for success */
            border: 1px solid #1e7e34; /* Darker green border */
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            border-color: #c3e6cb; /* Light green border */
        }

        .alert-success .icon {
            font-size: 20px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .alert .close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
        }

        .alert .close:hover {
            color: #d4edda; /* Lighter green on hover */
        }
</style>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<form method="POST" action="{{ route('password.email') }}" class="form" id="forgotPasswordForm">
    @csrf
    <h3>Forgot Password</h3>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="input-group">
        <input type="text" name="email" class="@error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}">
        <ion-icon class="icon" name="mail"></ion-icon>
    </div>
    @error('email')
        <span class="error-message-register">{{ $message }}</span>
    @enderror
    <div class="btn-box">
        <button class="button">{{ __('Send Reset Link') }}</button>
    </div>
    <div class="switch-button">
        <p>Remember your password?</p>
        <a href="{{ route('login') }}" id="showLoginFormFromForgot">Login</a>
    </div>
</form>
@endsection
