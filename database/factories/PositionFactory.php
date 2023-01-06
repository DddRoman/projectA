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
        $ind=FactoryService::getRandomIndustriaId();
        $struct=FactoryService::getRandomStructureId($ind);
        return [
            'dependence'=>FactoryService::getRandomPositionId($struct),
            'ind_id'=>$ind,
            'struct_id'=> $struct,
            'name'=>fake()->text(20),
            'abv'=>Str::random(3),
            'discription'=>fake()->text(500),
        ];
    }
}
