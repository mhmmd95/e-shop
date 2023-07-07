<?php

declare (strict_types = 1);

namespace Database\Factories;

use Domains\Customer\Models\Customer;
use Domains\Shared\Enums\Profession as EnumProfession;
use Domains\Shared\Models\Profession;
use Domains\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'balance' => fake()->numberBetween(1200, 45000),
            'user_id' => User::factory()->create([
                'profession_id' => Profession::where('title', 'customer')->value('id')
            ]),
        ];
    }
}
