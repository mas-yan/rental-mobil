<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::whereEmail($request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                return redirect('/');
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password salah!'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegistrationRequest $request)
    {
        User::create($request->all());
        return redirect()->route('login')->with('success', 'Berhasil Register, Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
