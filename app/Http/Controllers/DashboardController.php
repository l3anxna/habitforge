<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $habits = $user->habits()
            ->with('checkins')
            ->get();

        $totalHabits = $habits->count();

        $totalCheckins = $habits->sum(function ($habit) {
            return $habit->checkins->count();
        });

        $completionRate = $totalHabits > 0
            ? round(($totalCheckins / $totalHabits) * 100)
            : 0;

        return view('user.dashboard', compact(
            'habits',
            'totalHabits',
            'totalCheckins',
            'completionRate'
        ));
    }
}