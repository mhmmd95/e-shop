<?php

declare (strict_types = 1);

namespace Domains\Vendor\Actions\Vendor;

use Domains\Vendor\Models\Vendor;

final class DestroyVendor {

    public static function handle(Vendor $vendor): void
    {
        $vendor->delete();
    }
}
