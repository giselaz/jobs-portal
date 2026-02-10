<?php

namespace Database\Seeders;

use App\Models\Employer;
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
        User::factory(300)->create();
        $users = User::all()->shuffle();
        for ($i = 0; $i < 19; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();
        for ($i = 0; $i < 100; $i++) {
            JobPortal::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
    }
}
