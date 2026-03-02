<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class CandidateProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone' => fake()->phoneNumber(),
            'location' => fake()->city,
            'job_title' => fake()->jobTitle,
            'bio' => fake()->paragraphs(2, true),
            'expected_salary' => fake()->numberBetween(4_000, 170_000),
            'salary_currency' => '$',
            'years_of_experience' => fake()->numberBetween(1, 8),
            'cv_path' => '',
            'is_profile_complete' => 0,
        ];
    }
}
