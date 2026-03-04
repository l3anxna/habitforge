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

        if (!session()->has('habits')) {
            session([
                'habits' => [
                    'Drink Water',
                    'Exercise',
                    'Read Book'
                ]
            ]);
        }

        $habitNames = session('habits');
        $habitData = [];

        foreach ($habitNames as $name) {

            $streak = session('streak_' . $name, 0);
            $completed = session('checked_' . $name, false);

            $habitData[] = [
                'name' => $name,
                'streak' => $streak,
                'completed' => $completed
            ];
        }

        $total = count($habitData);
        $completedCount = 0;

        foreach ($habitData as $habit) {
            if ($habit['completed']) {
                $completedCount++;
            }
        }

        $completionRate = $total > 0
            ? round(($completedCount / $total) * 100)
            : 0;

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
        session()->increment('streak_' . $habitName);

        return redirect()->route('user.dashboard');
    }

    public function habits()
    {
        if (session('role') != 'user') {
            return redirect('/login');
        }

        $defaultHabits = [
            'Drink Water',
            'Exercise',
            'Read Book'
        ];

        if (!session()->has('habits')) {
            session(['habits' => $defaultHabits]);
        }

        $habits = session('habits');

        return view('user.habits', ['habits' => $habits]);
    }

    public function createHabit()
    {
        if (session('role') != 'user') {
            return redirect('/login');
        }

        return view('user.create');
    }

    public function storeHabit(Request $request)
    {
        $habitName = $request->habit;

        if ($habitName) {
            session()->push('habits', $habitName);
        }

        return redirect()->route('user.habits');
    }
}