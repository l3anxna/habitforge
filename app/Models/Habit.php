<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function streak()
    {
        $dates = $this->checkins()
            ->orderBy('checked_at','desc')
            ->pluck('checked_at')
            ->map(fn($d) => $d->toDateString());

        $streak = 0;
        $current = today();

        foreach ($dates as $date) {
            if ($date === $current->toDateString()) {
                $streak++;
                $current->subDay();
            } else {
                break;
            }
        }

        return $streak;
    }
}