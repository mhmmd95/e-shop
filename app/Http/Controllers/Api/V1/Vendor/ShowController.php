<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Vendor;

use Domains\Vendor\Resources\VendorResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use Domains\Vendor\Models\Vendor;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class ShowController extends Controller
{
    use ApiResponse;

    public function __invoke(Vendor $vendor): JsonResponse
    {
        $vendors = QueryBuilder::for(
            subject: Vendor::class,
        )->allowedIncludes(
            includes: ['businesses.categories'],
        )->allowedFilters(
            filters: ['name', 'phone'],
        )->where('uuid', $vendor->uuid)
        ->paginate();

        return $this->handle_success(
            data: VendorResource::collection($vendors),
        );
    }
}
