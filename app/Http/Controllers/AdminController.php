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
        $this->authorize('viewAny', User::class);

        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function updateRole(User $user)
    {
        $this->authorize('updateRole', $user);

        $user->role = $user->role === 'admin' ? 'user' : 'admin';

        $user->save();

        return back()->with('success','User role updated.');
    }

    public function userHabits(User $user)
    {
        $this->authorize('view', $user);

        $habits = $user->habits()->withCount('checkins')->get();

        return view('admin.userHabits', compact('user','habits'));
    }
}