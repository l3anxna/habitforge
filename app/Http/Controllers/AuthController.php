<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $email = $request->email;

        if ($email == 'admin@mail.com') {
            session(['role' => 'admin']);
            return redirect()->route('admin.dashboard');
        }

        session(['role' => 'user']);
        return redirect('/dashboard');
    }

    public function register(Request $request)
    {
        $name = $request->name;

        return view('auth.register', ['message' => 'Registered user: ' . $name]);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}