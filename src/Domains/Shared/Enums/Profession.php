<?php

declare (strict_types = 1);

namespace Domains\Shared\Enums;

use Domains\Customer\Models\Customer;
use Domains\Vendor\Models\Vendor;

enum Profession: string {

    case CUSTOMER = 'customer';
    case VENDOR = 'vendor';

    function description(): string {
        return match($this) {
            Profession::CUSTOMER => 'a client who can buy from different system vendors',
            Profession::VENDOR => 'a vendor who can sell products from within a set of businesses',
        };
    }

    public function class(): string
    {
        return match($this) {
            Profession::CUSTOMER => Customer::class,
            Profession::VENDOR => Vendor::class,
        };
    }
}
