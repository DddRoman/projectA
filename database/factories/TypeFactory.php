<?php

namespace Database\Factories;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dep_max=Type::all()->count();
        return [
                'name'=>$this->faker->name,
                'dependence'=>rand(0,$dep_max),
                'discription'=>$this->faker->sentence,
        ];
    }
}
