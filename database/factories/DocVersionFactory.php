<?php

namespace Database\Factories;
use App\Services\FactoryService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocVersion>
 */
class DocVersionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doc_id'=>FactoryService::getRandomDocsId(),
            'name'=>fake()->name(),
            'shifr'=>Str::random(3),
            'version'=>rand(1,99),
            'year'=>rand(2010,2022),
        ];
    }
}
