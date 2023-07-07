<?php

declare (strict_types = 1);

namespace Database\Factories;

use Domains\Shared\Models\Profession;
use Domains\Shared\Models\User;
use Domains\Vendor\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'balance' => fake()->numberBetween(1200, 45000),
            'user_id' => User::factory()->create([
                'profession_id' => Profession::where('title', 'vendor')->value('id')
            ]),
        ];
    }
}
