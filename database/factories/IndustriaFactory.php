<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Industria;
use App\Services\FactoryService;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Industria>
 */
class IndustriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Industria::class;
    public function definition()
    {
        if(!Industria::find(1))
        return [
            'name'=>$this->faker->name,
            'type'=>FactoryService::getRandomTypeId(1), //1 -type industry
            'discription'=>$this->faker->sentence,
            'auth_id'=>FactoryService::getRandomUserId(1),
            'dependence'=>0,
        ];
        else
        return [
            'name'=>$this->faker->name,
            'type'=>FactoryService::getRandomTypeId(1), //1 -type industry
            'discription'=>$this->faker->sentence,
            'auth_id'=>FactoryService::getRandomUserId(1),
            'dependence'=>FactoryService::getRandomIndustria1Id(FactoryService::getRandomIndustria0Id()),
        ];
    }
}
