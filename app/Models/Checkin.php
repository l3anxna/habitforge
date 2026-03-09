<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'habit_id',
        'checked_at'
    ];

    protected $casts = [
        'checked_at' => 'date'
    ];

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}