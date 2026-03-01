<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Basic info
            $table->string('phone')->nullable();
            $table->string('location')->nullable();

            // Professional summary
            $table->string('job_title')->nullable(); // e.g. "Backend Developer"
            $table->text('bio')->nullable();         // short professional summary

            // Career info
            $table->integer('expected_salary')->nullable();
            $table->string('salary_currency', 10)->nullable();
            $table->integer('years_of_experience')->nullable(); // optional cache

            // CV
            $table->string('cv_path')->nullable();

            // Optional
            $table->boolean('is_profile_complete')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};
