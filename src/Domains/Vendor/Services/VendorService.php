<?php

declare (strict_types = 1);

namespace Domains\Vendor\Services;

use Domains\Vendor\Models\Business;
use Domains\Vendor\Models\Vendor;
use Domains\Vendor\ValueObjects\BusinessValueObject;

final class VendorService {

    public function createBusiness(Vendor $vendor, BusinessValueObject $object): void
    {
        $vendor->businesses()->create($object->toArray());
    }
}
