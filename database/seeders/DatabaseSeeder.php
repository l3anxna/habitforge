<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Habit;
use App\Models\Checkin;
use App\Models\Badge;
use Carbon\Carbon;
use Database\Factories\CheckinFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5)->create()->each(function (User $user) {
            for ($h = 0; $h < 3; $h++) {
                $habit = Habit::factory()->for($user)->create();

                $currentStreak = rand(0, 7);
                for ($d = 0; $d < $currentStreak; $d++) {
                    $date = Carbon::today()->subDays($d)->toDateString();
                    $this->createCheckinIfNotExists($habit, $date);
                }

                $olderCount = rand(0, 5);
                for ($i = 0; $i < $olderCount; $i++) {
                    $daysAgo = rand(8, 60);
                    $date = Carbon::today()->subDays($daysAgo)->toDateString();
                    $this->createCheckinIfNotExists($habit, $date);
                }
            }
        });

        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        CheckinFactory::resetUnique();

        $habit7 = Habit::factory()->for($testUser)->create(['name' => '7-day streak']);
        $this->createStreak($habit7, 7, Carbon::today());

        $habit30 = Habit::factory()->for($testUser)->create(['name' => '30-day streak']);
        $this->createStreak($habit30, 30, Carbon::today());

        $habitBroken = Habit::factory()->for($testUser)->create(['name' => 'Broken - missed yesterday']);
        $this->createStreak($habitBroken, 5, Carbon::today(), [1]);

        Habit::factory()->for($testUser)->create(['name' => 'No check-ins']);

        $habitLong = Habit::factory()->for($testUser)->create(['name' => 'Very long 120-day streak']);
        $this->createStreak($habitLong, 120, Carbon::today());

        $habitIntermittent = Habit::factory()->for($testUser)->create(['name' => 'Intermittent - every 3rd day']);
        for ($d = 0; $d < 30; $d++) {
            if ($d % 3 === 0) {
                $date = Carbon::today()->subDays($d)->toDateString();
                $this->createCheckinIfNotExists($habitIntermittent, $date);
            }
        }

        $habitFuture = Habit::factory()->for($testUser)->create(['name' => 'Future checkin']);
        $this->createCheckinIfNotExists($habitFuture, Carbon::tomorrow()->toDateString());

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $habit1 = Habit::factory()->for($admin)->create(['name' => 'Daily Journal']);
        $habit2 = Habit::factory()->for($admin)->create(['name' => 'Morning Run']);

        for ($d = 0; $d < 3; $d++) {
            $date = Carbon::today()->subDays($d)->toDateString();
            $this->createCheckinIfNotExists($habit1, $date);
        }

        for ($d = 0; $d < 2; $d++) {
            $date = Carbon::today()->subDays($d)->toDateString();
            $this->createCheckinIfNotExists($habit2, $date);
        }

        // Seed some example badges for the test user so the dashboard shows them
        if (!Badge::where('habit_id', $habit7->id)->where('type', '7-day')->exists()) {
            Badge::create(['habit_id' => $habit7->id, 'type' => '7-day']);
        }

        if (!Badge::where('habit_id', $habit30->id)->where('type', '7-day')->exists()) {
            Badge::create(['habit_id' => $habit30->id, 'type' => '7-day']);
        }
        if (!Badge::where('habit_id', $habit30->id)->where('type', '30-day')->exists()) {
            Badge::create(['habit_id' => $habit30->id, 'type' => '30-day']);
        }

        if (!Badge::where('habit_id', $habitLong->id)->where('type', '90-day')->exists()) {
            Badge::create(['habit_id' => $habitLong->id, 'type' => '90-day']);
        }
    }

    /**
     * Create a consecutive streak ending at $endDate with optional gaps.
     *
     * @param  \App\Models\Habit  $habit
     * @param  int  $length  Number of days to iterate (counts back from endDate)
     * @param  \Carbon\Carbon  $endDate  The last day to consider (usually today)
     * @param  array<int>  $gaps  Offsets (in days) to skip, 0 = endDate, 1 = yesterday, etc.
     * @return void
     */
    private function createStreak(Habit $habit, int $length, Carbon $endDate, array $gaps = []): void
    {
        CheckinFactory::resetUnique();

        for ($i = 0; $i < $length; $i++) {
            if (in_array($i, $gaps, true)) {
                continue;
            }

            $date = $endDate->copy()->subDays($i)->toDateString();
            $this->createCheckinIfNotExists($habit, $date);
        }
    }

    private function createCheckinIfNotExists(Habit $habit, string $date): void
    {
        if (!Checkin::where('habit_id', $habit->id)->where('checked_at', $date)->exists()) {
            Checkin::factory()->for($habit)->withDate($date)->create();
        }
    }
}