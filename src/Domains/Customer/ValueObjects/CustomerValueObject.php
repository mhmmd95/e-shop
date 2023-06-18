<?php

namespace Domains\Customer\ValueObjects;

final class CustomerValueObject
{
    public function __construct(
        readonly public string $user,
        readonly public string $name,
        readonly public string|null $phone = null,
        readonly public float $balance = 0.00,
    ) {
    }

    public function toArray(): array
    {
        return [
            'user' => $this->user,
            'name' => $this->name,
            'phone' => $this->phone,
            'balance' => $this->balance,
        ];
    }
}
