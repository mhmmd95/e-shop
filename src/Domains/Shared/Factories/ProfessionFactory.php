<?php

namespace Domains\Shared\Factories;

use Domains\Shared\ValueObjects\ProfessionValueObject;

final class ProfessionFactory {

    public static function make(array $validatedData): ProfessionValueObject
    {
        return new ProfessionValueObject(...$validatedData);
    }
}
