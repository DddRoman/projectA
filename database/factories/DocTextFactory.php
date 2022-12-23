<?php

namespace Database\Factories;
use App\Services\FactoryService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocText>
 */
class DocTextFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $doc=FactoryService::getRandomDocVersionId();
        return [
            'doc_version_id'=>$doc,
            'type'=>rand(0,10),
            'dependence'=>FactoryService::getRandomDocTextId($doc),
            'prioritete'=>rand(0,100),
            'text'=>fake()->text(rand(50,110)),
            'draft'=>rand(0,1),
        ];
    }
}
