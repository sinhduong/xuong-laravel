<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password; // Import lớp Password

class PasswordResetController extends Controller
{
    // Hiển thị form yêu cầu đặt lại mật khẩu
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Xử lý yêu cầu gửi liên kết đặt lại mật khẩu
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response === Password::RESET_LINK_SENT
            ? back()->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }

    // Hiển thị form đặt lại mật khẩu
    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with('token', $token);
    }

    // Xử lý đặt lại mật khẩu
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required',
        ]);

        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
            Auth::login($user);
        });

        return $response === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __('Password has been reset!'))
            : back()->withErrors(['email' => [__($response)]]);
    }
}
