<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('home');
        }

        // If authentication fails, redirect back with a generic error message
        return redirect()->back()->withErrors([
            'login' => 'Email hoặc mật khẩu không khớp.',
        ]);
    }





// Hiển thị form đăng ký
public function showFormRegister()
{
    return view('auth.register');
}

// Xử lý đăng ký
public function register(RegisterRequest $request)
{
    $data = $request->validated();

    // Hash the password
    $data['password'] = Hash::make($data['password']);

    // Create the user
    $user = User::create($data);

    // Log the user in
    Auth::login($user);

    // Redirect to the intended page
    return redirect()->intended('home');
}

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
