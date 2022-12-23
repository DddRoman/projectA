<?php

namespace Database\Factories;

use App\Services\FactoryService;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PoliticsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ind_id'=>FactoryService::getRandomIndustriaId(),
            'name'=>fake()->name(),
            'text'=>fake()->text(rand(20,100)),
        ];
    }
}
