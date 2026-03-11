<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;
use App\Http\Requests\HabitRequest;

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

    public function store(HabitRequest $request)
    {
        auth()->user()->habits()->create([
            'name' => $request->validated()['name']
        ]);

        return redirect()->route('habits.index');
    }


    public function edit(Habit $habit)
    {
        $this->authorize('update', $habit);

        return view('user.habits.edit', compact('habit'));
    }

    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

        $habit->update([
            'name' => $request->validated()['name']
        ]);

        return redirect()->route('habits.index');
    }

    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect()->route('habits.index');
    }

    public function checkin(Habit $habit)
    {
        $this->authorize('checkin', $habit);

        $alreadyChecked = $habit->checkins()
            ->whereDate('checked_at', today())
            ->exists();

        if (!$alreadyChecked) {
            $habit->checkins()->create([
                'checked_at' => today()
            ]);
        }

        return redirect()->route('dashboard');
    }

}