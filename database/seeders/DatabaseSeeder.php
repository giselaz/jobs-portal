<?php

namespace Database\Seeders;

use App\Models\CandidateProfile;
use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobPortal;
use App\Models\User;
use Database\Factories\EmployerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create employers
        // 1️⃣ Create 100 users
        User::factory(100)->create();

        // 2️⃣ Shuffle users
        $users = User::all()->shuffle();

        // 3️⃣ Assign 21 employers
        $employerUsers = $users->take(21); // first 21 users
        foreach ($employerUsers as $user) {
            Employer::factory()->create([
                'user_id' => $user->id
            ]);

            $user->update(['role' => 'employer']);
        }

        // 4️⃣ Assign remaining users as candidates
        $candidateUsers = $users->slice(21); // rest of the users
        foreach ($candidateUsers as $user) {
            $user->update(['role' => 'candidate']);

            CandidateProfile::factory()->create([
                'user_id' => $user->id
            ]);
        }
        $employers = Employer::all();
        for ($i = 0; $i < 100; $i++) {
            JobPortal::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($candidateUsers as $user) {
            $jobs = JobPortal::inRandomOrder()->take(rand(0, 4))->get();
            foreach ($jobs as $job) {
                JobApplication::factory()->create(
                    [
                        'user_id' => $user->id,
                        'job_portal_id' => $job->id
                    ]
                );
            }
        }
    }
}
