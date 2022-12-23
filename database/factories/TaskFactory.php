<?php

namespace Database\Factories;
use App\Services\FactoryService;
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
    public function definition()
    {
        return [
            'goal_id'=>FactoryService::getRandomGoalsId(),
            'name'=>fake()->name(),
            'text'=>fake()->text(500),
        ];
    }
}
