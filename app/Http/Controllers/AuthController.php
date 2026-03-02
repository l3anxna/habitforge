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

        return view('auth.login', ['message' => 'Login attempt for ' . $email]);
    }

    public function register(Request $request)
    {
        $name = $request->name;

        return view('auth.register', ['message' => 'Registered user: ' . $name]);
    }
}