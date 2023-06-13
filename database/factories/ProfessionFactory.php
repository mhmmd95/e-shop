<?php

declare (strict_types = 1);

namespace Database\Factories;

use Domain\Customer\Models\Profession;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessionFactory extends Factory
{
    protected $model = Profession::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->sentence(7),
        ];
    }
}
