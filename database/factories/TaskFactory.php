<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement([
            'todo',
            'in_progress',
            'done',
        ]);

        return [
            'project_id' => Project::inRandomOrder()->value('id'),

            'title' => fake()->sentence(4),

            'description' => fake()->paragraph(),

            'priority' => fake()->randomElement([
                'low',
                'medium',
                'high',
            ]),

            'status' => $status,

            'due_date' => match ($status) {
                'done' => fake()->dateTimeBetween('-30 days', 'today')->format('Y-m-d'),
                default => fake()->boolean(30)
                    ? fake()->dateTimeBetween('-30 days', '-1 day')->format('Y-m-d') // Overdue
                    : fake()->dateTimeBetween('today', '+30 days')->format('Y-m-d'),
            },
        ];
    }
}
