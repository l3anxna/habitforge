<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index()
    {
        $habits = auth()->user()->habits;

        return view('habits.index', compact('habits'));
    }

    public function create()
    {
        return view('habits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        auth()->user()->habits()->create([
            'name' => $request->name
        ]);

        return redirect()->route('habits.index');
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();

        return redirect()->route('habits.index');
    }

    public function checkin(Habit $habit)
    {
        $alreadyChecked = $habit->checkins()
            ->whereDate('checked_at', today())
            ->exists();

        if (!$alreadyChecked) {
            $habit->checkins()->create([
                'checked_at' => today()
            ]);
        }

        return redirect()->route('habits.index');
    }
}