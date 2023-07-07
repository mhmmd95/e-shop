<?php

declare (strict_types = 1);

namespace Database\Factories;

use Domains\Vendor\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{

    protected $model = Business::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->jobTitle(),
            'description' => fake()->sentence(13),
        ];
    }
}
