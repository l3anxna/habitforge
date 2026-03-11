<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();

            $table->foreignId('habit_id')
                ->constrained('habits')
                ->cascadeOnDelete();

            $table->string('type');

            $table->timestamps();

            $table->unique(['habit_id', 'type']);
            $table->index(['habit_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
