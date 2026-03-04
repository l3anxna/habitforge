<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $habits = auth()->user()->habits()->with('checkins')->get();

        return view('dashboard', compact('habits'));
    }
}
