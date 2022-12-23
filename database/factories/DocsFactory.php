<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\FactoryService;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docs>
 */
class DocsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'str_id'=> FactoryService::getRandomStructure0Id(),
        ];
    }
}
