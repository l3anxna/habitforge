<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'habit_id',
        'type',
    ];

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
