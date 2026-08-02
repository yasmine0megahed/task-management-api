<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('role', '!=', 'admin')
            ->get()
            ->each(function ($user) {
                Project::factory()
                    ->count(5)
                    ->create([
                        'user_id' => $user->id,
                    ]);
            });
    }
}
