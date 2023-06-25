<?php

declare (strict_types = 1);

namespace Domains\Vendor\ValueObjects;

final class CategoryValueObject
{
    public function __construct(
        readonly public string $business,
        readonly public string $name,
        readonly public string $description,
    ) {
    }

    public function toArray(): array
    {
        return [
            'business' => $this->business,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
