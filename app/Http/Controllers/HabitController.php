<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index()
    {
        $habits = auth()->user()->habits;

        return view('user.habits.index', compact('habits'));
    }

    public function create()
    {
        return view('user.habits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        auth()->user()->habits()->create([
            'name' => $request->string('name')
        ]);

        return redirect()->route('habits.index');
    }


    public function edit(Habit $habit)
    {
        if ($habit->user_id !== auth()->id()) {
            abort(403);
        }

        return view('user.habits.edit', compact('habit'));
    }

    public function update(Request $request, Habit $habit)
    {
        if ($habit->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $habit->update([
            'name' => $request->name
        ]);

        return redirect()->route('habits.index');
    }

    public function destroy(Habit $habit)
    {
        if ($habit->user_id !== auth()->id()) {
            abort(403);
        }

        $habit->delete();

        return redirect()->route('habits.index');
    }

    public function checkin(Habit $habit)
    {
        if ($habit->user_id !== auth()->id()) {
            abort(403);
        }

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

    public function streak()
    {
        return $this->checkins()
            ->orderBy('checked_at','desc')
            ->get()
            ->count();
    }
}