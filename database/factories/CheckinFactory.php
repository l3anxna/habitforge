<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Habit;

class CheckinFactory extends Factory
{
    public function definition(): array
    {
        return [
            'habit_id' => Habit::factory(),
            'checked_at' => fake()->unique()->dateTimeBetween('-365 days', 'now')->format('Y-m-d'),
        ];
    }

    public function withDate(string $date): static
    {
        return $this->state(fn () => ['checked_at' => $date]);
    }

    public function onDate(string $date): static
    {
        return $this->withDate($date);
    }

    public static function resetUnique(): void
    {
        fake()->unique(true);
    }
}