<?php

namespace Database\Factories;
use App\Services\FactoryService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ind=FactoryService::getRandomStructure0Id();
        return [
            'dependence'=>FactoryService::getRandomPositionId($ind),
            'struct_id'=> $ind,
            'name'=>fake()->name(),
            'abv'=>Str::random(3),
            'discription'=>fake()->text(500),
        ];
    }
}
