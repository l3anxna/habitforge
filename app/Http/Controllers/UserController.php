<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        if (session('role') != 'user') {
            return redirect('/login');
        }

        $habits = [
            [
                'name' => 'Drink Water',
                'streak' => 5,
                'completed' => true
            ],
            [
                'name' => 'Exercise',
                'streak' => 3,
                'completed' => false
            ],
            [
                'name' => 'Read Book',
                'streak' => 7,
                'completed' => true
            ]
        ];

        $completionRate = 66;

        return view('user.dashboard', [
            'habits' => $habits,
            'completionRate' => $completionRate
        ]);
    }
}