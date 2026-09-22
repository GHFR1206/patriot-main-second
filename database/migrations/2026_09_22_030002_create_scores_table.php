<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('challenge_id')->constrained()->cascadeOnDelete();
            $table->integer('points')->default(0);
            $table->decimal('time_seconds', 6, 2)->nullable();
            $table->integer('penalties')->default(0);
            $table->integer('bonuses')->default(0);
            $table->enum('status', ['pending', 'completed', 'disqualified'])->default('completed');
            $table->text('notes')->nullable();
            $table->foreignId('judged_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->unique(['team_id', 'challenge_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
