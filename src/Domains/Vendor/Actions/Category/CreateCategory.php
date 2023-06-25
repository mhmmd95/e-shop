<?php

declare (strict_types = 1);

namespace Domains\Vendor\Actions\Category;

use Domains\Vendor\ValueObjects\CategoryValueObject;
use Domains\Vendor\Models\Business;
use Infrastructure\ApiResponse;

class CreateCategory {

    use ApiResponse;

    public static function handle(CategoryValueObject $categoryVO): void
    {
        $business = Business::whereUuid($categoryVO->business)->first();
        $business->categories()->create($categoryVO->toArray());
    }
}
