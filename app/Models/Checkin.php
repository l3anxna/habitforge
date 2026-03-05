<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = ['habit_id', 'checked_at'];

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}