<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('school');
            $table->enum('age_group', ['junior', 'middle', 'senior'])->default('middle');
            $table->string('robot_name')->nullable();
            $table->integer('members_count')->default(3);
            $table->json('members')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('color')->default('#4ECDC4');
            $table->string('emoji')->default('🤖');
            $table->integer('total_points')->default(0);
            $table->decimal('best_time', 6, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
