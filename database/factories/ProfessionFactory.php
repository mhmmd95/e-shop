<?php

declare (strict_types = 1);

namespace Database\Factories;

use Domains\Shared\Models\Profession;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessionFactory extends Factory
{
    protected $model = Profession::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'title' => fake()->jobTitle(),
            'description' => fake()->sentence(7),
        ];
    }
}
