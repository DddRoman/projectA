<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Industria;
use App\Models\Structure;
use App\Services\FactoryService;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Structure>
 */
class StructureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $ind=FactoryService::getRandomIndustria1Id(FactoryService::getRandomIndustria0Id());
        return [
            'ind_id'=> $ind,
            'dependence'=>FactoryService::getRandomStructureId($ind),
            'name'=>fake()->name(),
            'abv'=>Str::random(3),
        ];


    }
}
