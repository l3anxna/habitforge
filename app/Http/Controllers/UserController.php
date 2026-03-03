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
            'Drink Water' => 5,
            'Exercise' => 3,
            'Read Book' => 7
        ];
        
        $habitData = [];
        
        foreach ($habits as $name => $streak) {
            $completed = session('checked_' . $name, false);
        
            $habitData[] = [
                'name' => $name,
                'streak' => $streak,
                'completed' => $completed
            ];
        }
        
        $completionRate = 66;
        
        return view('user.dashboard', [
            'habits' => $habitData,
            'completionRate' => $completionRate
        ]);
    }

    public function checkin($habitName)
    {
        if (session('role') != 'user') {
            return redirect('/login');
        }

        session(['checked_' . $habitName => true]);

        return redirect()->route('user.dashboard');
    }
}