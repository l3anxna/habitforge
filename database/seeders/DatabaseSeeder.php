<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Habit;
use App\Models\Checkin;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5)
            ->has(
                Habit::factory(3)
                    ->has(Checkin::factory(5))
            )
            ->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $habit1 = Habit::factory()->for($admin)->create(['name' => 'Daily Journal']);
        $habit2 = Habit::factory()->for($admin)->create(['name' => 'Morning Run']);

        Checkin::factory()->for($habit1)->count(3)->create();
        Checkin::factory()->for($habit2)->count(2)->create();
    }
}