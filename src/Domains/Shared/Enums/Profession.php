<?php

declare (strict_types = 1);

namespace Domains\Shared\Enums;

enum Profession: string {

    case CUSTOMER = 'customer';
    case VENDOR = 'vendor';

    function description(): string {
        return match($this) {
            Profession::CUSTOMER => 'a client who can buy from different system vendors',
            Profession::VENDOR => 'a vendor who can sell products from within a set of businesses',
        };
    }
}
