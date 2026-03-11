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

    public function badges()
    {
        return $this->hasMany(Badge::class);
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

    /**
     * Award badges based on configured streak thresholds.
     * Creates a Badge record for this habit when a threshold is reached.
     * Returns an array of newly awarded badge types.
     */
    public function awardBadges(): array
    {
        $thresholds = [
            7 => '7-day',
            30 => '30-day',
            90 => '90-day',
            365 => '365-day',
        ];

        $streak = $this->streak();

        $awarded = [];

        foreach ($thresholds as $days => $type) {
            if ($streak >= $days) {
                // create badge if not already awarded
                if (!$this->badges()->where('type', $type)->exists()) {
                    $this->badges()->create(['type' => $type]);
                    $awarded[] = $type;
                }
            }
        }

        return $awarded;
    }
}