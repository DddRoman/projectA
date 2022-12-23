<?php

namespace Database\Factories;

use App\Services\FactoryService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocVerification>
 */
class DocVerificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doc_version_id'=>FactoryService::getRandomDocVersionId(),
            'action'=>rand(1,10),
            'user_id'=>FactoryService::getRandomUserId(),
        ];
    }
}
