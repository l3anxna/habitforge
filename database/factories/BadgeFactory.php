<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Habit;

class BadgeFactory extends Factory
{
    public function definition(): array
    {
        $types = ['7-day','30-day','90-day','365-day'];

        return [
            'habit_id' => Habit::factory(),
            'type' => $this->faker->randomElement($types),
        ];
    }

    public function forHabit(Habit $habit): static
    {
        return $this->state(fn () => ['habit_id' => $habit->id]);
    }
}
