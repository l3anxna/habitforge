<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('user/dashboard', compact(
            'habits',
            'totalHabits',
            'totalCheckins'
        ));
    }
}