<?php

namespace Domains\Shared\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Domains\Shared\Enums\Profession as EnumsProfession;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Domains\Shared\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    public function run(): void
    {
        Profession::factory(2)->state(new Sequence(
            ['title' => EnumsProfession::CUSTOMER, 'description' => EnumsProfession::CUSTOMER->description(), 'class' => EnumsProfession::CUSTOMER->class()],
            ['title' => EnumsProfession::VENDOR, 'description' => EnumsProfession::VENDOR->description(), 'class' => EnumsProfession::VENDOR->class()],
        ))->create();
    }
}
