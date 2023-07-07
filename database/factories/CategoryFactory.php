<?php

declare (strict_types = 1);

namespace Database\Factories;

use Domains\Vendor\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(13),
        ];
    }
}
