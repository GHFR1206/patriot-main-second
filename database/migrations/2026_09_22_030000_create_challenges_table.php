<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('short_description')->nullable();
            $table->string('icon')->default('🤖');
            $table->string('color')->default('#5E3C9F');
            $table->string('gradient_from')->default('#5E3C9F');
            $table->string('gradient_to')->default('#F4CF3B');
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');
            $table->integer('max_time_seconds')->default(120);
            $table->integer('max_points')->default(100);
            $table->json('obstacles')->nullable();
            $table->text('rules')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
