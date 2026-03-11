<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $habits = $user->habits()
            ->with(['checkins' => function ($query) {
                $query->whereDate('checked_at', today());
            }, 'badges'])
            ->get();

        $totalHabits = $habits->count();

        $todayCheckins = $habits->sum(function ($habit) {
            return $habit->checkins->count();
        });

        $completionRate = $totalHabits > 0
            ? round(($todayCheckins / $totalHabits) * 100)
            : 0;

        return view('user.dashboard', compact(
            'habits',
            'totalHabits',
            'todayCheckins',
            'completionRate'
        ));
    }
}