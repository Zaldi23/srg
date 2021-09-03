<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login_form()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
            ],
            [
                'email.ends_with' => 'Email tidak valid.',
            ]
        );
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('welcome');
        }
        else{
            return redirect()->back()->with('gagal','Ooops, email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
