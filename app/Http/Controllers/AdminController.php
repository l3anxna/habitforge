<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (session('role') != 'admin') {
            return redirect('/login');
        }

        $totalUsers = 10;
        $totalHabits = 25;

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalHabits' => $totalHabits
        ]);
    }

    public function users()
    {
        if (session('role') != 'admin') {
            return redirect('/login');
        }

        $users = [
            'John',
            'Sarah',
            'Michael'
        ];

        return view('admin.users', ['users' => $users]);
    }
}