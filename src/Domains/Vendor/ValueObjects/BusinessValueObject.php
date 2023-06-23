<?php

declare (strict_types = 1);

namespace Domains\Vendor\ValueObjects;

final class BusinessValueObject
{
    public function __construct(
        // readonly public string $vendor,
        readonly public string $name,
        readonly public string $description,
    ) {
    }

    public function toArray(): array
    {
        return [
            // 'vendor' => $this->vendor,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
