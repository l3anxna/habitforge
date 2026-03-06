<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Habit;
use App\Models\Checkin;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalHabits = Habit::count();
        $totalCheckins = Checkin::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalHabits',
            'totalCheckins'
        ));
    }

    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }
}