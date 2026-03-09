<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('checkins', function (Blueprint $table) {

            $table->id();

            $table->foreignId('habit_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('checked_at');

            $table->timestamps();

            // Prevent duplicate check-ins per day
            $table->unique(['habit_id', 'checked_at']);

            // Performance indexes
            $table->index(['habit_id', 'checked_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkins');
    }
};