<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Industria;
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
        $ind_id_max=Industria::all()->count();
        return [
            'ind_id'=>rand(1,$ind_id_max),
            'dependence'=>0,
            'name'=>fake()->name(),
            'abv'=>Str::random(3),
        ];
    }
}
