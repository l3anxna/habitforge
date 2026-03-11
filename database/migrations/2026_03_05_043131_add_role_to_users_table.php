<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['user', 'admin'])->default('user');
                $table->index('role');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                // dropIndex requires the index name; use convention: table_column_index
                $indexName = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());
                // Fallback: attempt to drop by column index name pattern
                try {
                    $table->dropIndex([$table->getTable()."_role_index"]);
                } catch (\Throwable $e) {
                    // ignore if index does not exist
                }

                $table->dropColumn('role');
            });
        }
    }
};