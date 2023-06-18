<?php

namespace Domains\Customer\Factories;

use Domains\Customer\ValueObjects\CustomerValueObject;

final class CustomerFactory {

    public static function make(array $validatedData): CustomerValueObject
    {
        return new CustomerValueObject(...$validatedData);
    }
}
