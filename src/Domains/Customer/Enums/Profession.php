<?php

declare (strict_types = 1);

namespace Domains\Customer\Enums;

enum Profession: string {

    case CUSTOMER = 'customer';
    // case VENDOR = vendor::class;

    function description(): string {
        return match($this) {
            Profession::CUSTOMER => 'a client who can buy from different system vendors',
        };
    }
}
